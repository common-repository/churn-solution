function handleChurnSolutionRewriteCancelButton($) {
    var elements = $('a[href*="/membership-account/membership-cancel"]');
    if (elements.length > 0) {
        checkConnection($, elements);
    }
}

function checkConnection($, elements) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/wp-json/churnsolution/v1/connection`,
        type: 'GET',
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response) {
            if (response?.app_id && response?.api_key) {
                const {app_id, api_key} = response;
                clickFlow($, elements, app_id, api_key);
            } else {
                console.error("Response does not contain appId or secretKey");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
        }
    });
}

function clickFlow($, elements, appId, secretKey) {
    elements.each(function () {
        var element = $(this);
        var href = element.attr('href'); // Get the href attribute

        if (href && !href?.includes('levelstocancel')) {
            return;
        }

        var tagName = element.prop("tagName").toLowerCase();
        element.on('click', function (e) {
            e.preventDefault();
            if (tagName === 'a') {
                const clickedUrl = this.getAttribute("href");
                const urlParams = new URLSearchParams(e.target.search);
                const levelstocancel = urlParams.get('levelstocancel');
                if (levelstocancel) {
                    checkSubscription($, levelstocancel, appId, secretKey, clickedUrl);
                } else {
                    console.error("There is no level value to cancel");
                }
            }
        });
    });
}

function checkSubscription($, levelId, appId, secretKey, clickedUrl) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/wp-json/churnsolution/v1/subscription?level_id=${levelId}`,
        type: 'GET',
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response) {
            if (response?.external_id) {
                triggerChurnSolutionFlow($, response.external_id, levelId, appId, secretKey);
            } else {
                console.error("Response does not contain subscription Id");
                window.location.href = clickedUrl;
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
        }
    });
}

function triggerChurnSolutionFlow($, subscriptionId, levelId, appId, secretKey) {
    $.ajax({
        url: churn_ajax_obj.ajax_url,
        type: 'POST',
        data: {
            action: 'get_hmac_hash',
            nonce: churn_ajax_obj.nonce,
            subscription_id: subscriptionId,
            secret_key: secretKey
        },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response) {
            window.churnSolution?.run(
                response,
                subscriptionId,
                appId,
                getChurnSolutionCallbacks($, levelId)
            );
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function getChurnSolutionCallbacks($, levelId) {
    return {
        handleCancel: async () => {
            await new Promise((resolve, reject) => {
                handlePaidMembershipProCancel($, levelId, resolve, reject);
            });
        },
        handleClose: () => {
        },
        handleDone: () => {
        },
        handleAbandon: () => {
            churnSolution.clearState();
        },
        handlePause: async ({pausePeriod}, customer) => {
            await new Promise((resolve, reject) => {
                handlePaidMembershipProPause($, pausePeriod, resolve, reject);
            });
        },
        handleSwitchPlan: () => {
        },
        handleTrialExtension: async ({trialExtensionDays}, customer) => {
            await new Promise((resolve, reject) => {
                handlePaidMembershipProExtend($, trialExtensionDays, resolve, reject);
            });
        },
        handleCoupon: async ({code}, customer) => {
            await new Promise((resolve, reject) => {
                handlePaidMembershipProApplyCoupon($, code, resolve, reject);
            });
        },
        autoCancel: false,
        autoPause: false,
        autoSwitchPlan: true,
        autoTrialExtension: false,
        autoCoupon: false
    };
}

function handlePaidMembershipProCancel($, levelId, resolve, reject) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/membership-account/membership-cancel/`,
        type: 'POST',
        data: {
            nonce: churn_ajax_obj.pmpro_cancel_nonce,
            levelstocancel: levelId,
            confirm: 1,
            'pmpro_cancel-nonce': churn_ajax_obj.pmpro_cancel_nonce,
            _wp_http_referer: location.href
        },
        success: function (response, textStatus, xhr) {
            if (resolve) {
                resolve({message: ''});
            }
            const contentType = xhr.getResponseHeader("Content-Type");
            if (contentType && contentType.indexOf("text/html") !== -1) {
                $('body').html(response);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            if (reject) {
                reject({message: 'Failed to cancel account. Please contact support.'});
            }
        }
    });
}

function handlePaidMembershipProApplyCoupon($, code, resolve, reject) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/wp-json/churnsolution/v1/subscription/apply-coupon`,
        type: 'POST',
        data: {
            coupon_code: code
        },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response, textStatus, xhr) {
            if (resolve) {
                resolve({message: ''});
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            if (xhr.status === 200 && xhr.responseText === "" && resolve) {
                resolve({message: ''});
            } else {
                if (reject) {
                    reject({message: 'Failed to apply coupon. Please contact support.'});
                }
            }
        }
    });
}

function handlePaidMembershipProPause($, pausePeriod, resolve, reject) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/wp-json/churnsolution/v1/subscription/pause`,
        type: 'POST',
        data: {
            number_of_months: pausePeriod
        },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response, textStatus, xhr) {
            if (resolve) {
                resolve({message: ''});
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            if (xhr.status === 200 && xhr.responseText === "" && resolve) {
                resolve({message: ''});
            } else {
                if (reject) {
                    reject({message: 'Failed to apply coupon. Please contact support.'});
                }
            }
        }
    });
}

function handlePaidMembershipProExtend($, trialExtensionDays, resolve, reject) {
    $.ajax({
        url: `${churn_ajax_obj.base_url}/wp-json/churnsolution/v1/subscription/extend-free-trial`,
        type: 'POST',
        data: {
            number_of_days: trialExtensionDays
        },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', churn_ajax_obj.nonce);
        },
        success: function (response, textStatus, xhr) {
            if (resolve) {
                resolve({message: ''});
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            if (xhr.status === 200 && xhr.responseText === "" && resolve) {
                resolve({message: ''});
            } else {
                if (reject) {
                    reject({message: 'Failed to apply coupon. Please contact support.'});
                }
            }
        }
    });
}

jQuery(document).ready(function ($) {
    // Call the custom JavaScript function
    handleChurnSolutionRewriteCancelButton($);
});
