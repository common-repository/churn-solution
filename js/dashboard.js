
function dashboardOnload(appIdValue, apiKeyValue, fromRedirect){
    document.getElementById("appId")?.addEventListener('input', function (evt) {
        configurationChanged('appIdSaveBtn');
    });

    document.getElementById("apiKey")?.addEventListener('input', function (evt) {
        configurationChanged('apiKeySaveBtn');
    });
    if (window.history.replaceState) {
        var urlWithoutParams = removeURLParameter(window.location.href, 'appId');
        urlWithoutParams = removeURLParameter(urlWithoutParams, 'apiKey');
        window.history.replaceState({path: urlWithoutParams}, '', urlWithoutParams);
        if (fromRedirect) {
            save(appIdValue, apiKeyValue, urlWithoutParams);
        }
    }
}

function save(appId, apiKey, url) {
    jQuery(document).ready(function ($) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                gateway: 'stripe',
                submit: 'true',
                api_key: apiKey,
                app_id: appId
            },
            success: function (response) {
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}

function configurationChanged(btnId) {
    document.getElementById(btnId).style.display = "inline-block";
}

function submitConfiguration() {
    document.getElementById("submitBtnId").click();
}

function removeURLParameter(url, parameter) {
    var urlParts = url.split('?');
    if (urlParts.length >= 2) {
        var prefix = encodeURIComponent(parameter) + '=';
        var parts = urlParts[1].split(/[&;]/g);

        for (var i = parts.length; i-- > 0;) {
            if (parts[i].lastIndexOf(prefix, 0) !== -1) {
                parts.splice(i, 1);
            }
        }

        return urlParts[0] + (parts.length > 0 ? '?' + parts.join('&') : '');
    }
    return url;
}

function toggleIcon(elId) {
    const el = document.getElementById(elId);
    if (el) {
        if (el.type === "text") {
            hideIcon(elId);
        } else {
            showIcon(elId);
        }
    }
}

function showIcon(elId) {
    const el = document.getElementById(elId);
    if (el) {
        document.getElementById(`chr-${elId}-show-hide-container`).innerHTML = showIconSVG();
        el.type = "text";
    }
}

function hideIcon(elId) {
    const el = document.getElementById(elId);
    if (el) {
        document.getElementById(`chr-${elId}-show-hide-container`).innerHTML = hideIconSVG();
        el.type = "password";
    }
}

function hideIconSVG() {
    return `
            <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            <svg width="20px" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 2L22 22" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6.71277 6.7226C3.66479 8.79527 2 12 2 12C2 12 5.63636 19 12 19C14.0503 19 15.8174 18.2734 17.2711 17.2884M11 5.05822C11.3254 5.02013 11.6588 5 12 5C18.3636 5 22 12 22 12C22 12 21.3082 13.3317 20 14.8335" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14 14.2362C13.4692 14.7112 12.7684 15.0001 12 15.0001C10.3431 15.0001 9 13.657 9 12.0001C9 11.1764 9.33193 10.4303 9.86932 9.88818" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        `;
}

function showIconSVG() {
    return `
            <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            <svg width="20px" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1 12C1 12 5 20 12 20C19 20 23 12 23 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="12" cy="12" r="3" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        `;
}