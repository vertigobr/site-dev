var wmpAppBanner = wmpAppBanner || {};
wmpAppBanner.WIDGET = wmpAppBanner.WIDGET || {};

wmpAppBanner.WIDGET.appUrl = wmpAppBanner.WIDGET.appUrl || '';
wmpAppBanner.WIDGET.appIcon = wmpAppBanner.WIDGET.appIcon || '';
wmpAppBanner.WIDGET.appName = wmpAppBanner.WIDGET.appName || '';
wmpAppBanner.WIDGET.ref = wmpAppBanner.WIDGET.ref || '';
wmpAppBanner.WIDGET.trustedDevice = wmpAppBanner.WIDGET.trustedDevice || 0;
wmpAppBanner.WIDGET.iframeUrl = wmpAppBanner.WIDGET.iframeUrl || '';
wmpAppBanner.WIDGET.cssPath = wmpAppBanner.WIDGET.cssPath || '';
wmpAppBanner.WIDGET.openAppButton = wmpAppBanner.WIDGET.openAppButton || 'OPEN';

(function() {

    var appticlesStage, stage;

    /**
     * Create timer that will check if the document is ready
     * @type {number}
     */
    var DOMLoadTimer = setInterval(function () {
        if (/loading|loaded|complete/i.test(document.readyState)) {
            clearInterval(DOMLoadTimer);
            documentLoaded();
        }
    }, 10);

    /**
     * Init method, called when the document is ready
     *
     * The 'redirect' GET param is used for hosted apps (on Appticles).
     * Setting redirect=false will deactivate the app banner.
     *
     */
    function documentLoaded() {

        // create stage
        appticlesStage = stage = new wmpAppBanner.Stage(wmpAppBanner.WIDGET);

        // get saved cookies
        var cookie = stage.cookie,
            mobileDevice = cookie.get(wmpAppBanner.WIDGET.cookiePrefix + "mobile_device"),
            redirect = cookie.get(wmpAppBanner.WIDGET.cookiePrefix + "redirect"),
            closed = cookie.get(wmpAppBanner.WIDGET.cookiePrefix + "closed"),
            appUrl = wmpAppBanner.WIDGET.appUrl;

        // if there was a previous detection and the device is mobile
        if (mobileDevice && Boolean(Number(String(mobileDevice))) == true && appUrl && appUrl.length > 1){

            // if there is a cookie already set, then convert it to a boolean value
            // redirect param is used for hosted apps (on Appticles)
            redirect = (redirect != null) ? Boolean(Number(String(redirect))) : true;

            var urlParams = window.location.href.split("?");

            // if the URL contains a redirect param, then set up a cookie with this value
            if (urlParams.length > 1){
                if (urlParams[urlParams.length-1].indexOf("redirect=false") != -1){
                    cookie.set(wmpAppBanner.WIDGET.cookiePrefix + "redirect", 0, 7);
                    redirect = false;
                }
                else if (urlParams[urlParams.length-1].indexOf("redirect=true") != -1){
                    cookie.set(wmpAppBanner.WIDGET.cookiePrefix + "redirect", 1, 7);
                    redirect = true;
                }
            }

            // create the wrapper bar
            if (redirect && !closed){

                // attach on hash change listener
                window.onhashchange = onHashChange;

                // create wrapper bar
                stage.createBar();
            }

            return;
        }
        // if there was a previous detection and the device is a desktop one
        else if (mobileDevice && Boolean(Number(String(mobileDevice))) == false){
            return;
        }
        else if (window.location.href.indexOf("redirect=false") != -1){
            return;
        }

        window.onhashchange = onHashChange;

        // detect device
        stage.detectDevice();
    }

    /**
     * The hashchange event fires when a window's hash changes (location.hash).
     * The hash is used for opening the app or hiding the banner (using close button from iframe).
     *
     */
    function onHashChange(){

        var params = window.location.hash.split("#")[1];

        if (params){
            params = params.split("=");

            if (params[0] == "app_action"){

                switch (params[1]){

                    case "closebar":
                        // set cookie
                        appticlesStage.cookie.set(wmpAppBanner.WIDGET.cookiePrefix + "closed", 1, 7);

                        // remove the bar
                        setTimeout(function(){
                            appticlesStage.bar.destroy();
                            appticlesStage = null;
                        }, 300);

                        window.onhashchange = null;
                        window.location.hash = "";
                        break;

                    case "openapp":
                        window.onhashchange = null;
                        window.location.hash = "";
                        appticlesStage.openApp();
                        break;

                    default: break;
                }
            }
        }
    }

}());