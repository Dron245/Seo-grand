(() => {
    "use strict";
    let bodyLockStatus = true;
    let bodyLockToggle = (delay = 500) => {
        if (document.documentElement.classList.contains("lock")) bodyUnlock(delay); else bodyLock(delay);
    };
    let bodyUnlock = (delay = 500) => {
        if (bodyLockStatus) {
            const lockPaddingElements = document.querySelectorAll("[data-lp]");
            setTimeout((() => {
                lockPaddingElements.forEach((lockPaddingElement => {
                    lockPaddingElement.style.paddingRight = "";
                }));
                document.body.style.paddingRight = "";
                document.documentElement.classList.remove("lock");
            }), delay);
            bodyLockStatus = false;
            setTimeout((function() {
                bodyLockStatus = true;
            }), delay);
        }
    };
    let bodyLock = (delay = 500) => {
        if (bodyLockStatus) {
            const lockPaddingElements = document.querySelectorAll("[data-lp]");
            const lockPaddingValue = window.innerWidth - document.body.offsetWidth + "px";
            lockPaddingElements.forEach((lockPaddingElement => {
                lockPaddingElement.style.paddingRight = lockPaddingValue;
            }));
            document.body.style.paddingRight = lockPaddingValue;
            document.documentElement.classList.add("lock");
            bodyLockStatus = false;
            setTimeout((function() {
                bodyLockStatus = true;
            }), delay);
        }
    };
    function menuInit() {
        if (document.querySelector(".icon-menu")) document.addEventListener("click", (function(e) {
            if (bodyLockStatus && e.target.closest(".icon-menu")) {
                bodyLockToggle();
                document.documentElement.classList.toggle("menu-open");
            }
        }));
    }
    let addWindowScrollEvent = false;
    setTimeout((() => {
        if (addWindowScrollEvent) {
            let windowScroll = new Event("windowScroll");
            window.addEventListener("scroll", (function(e) {
                document.dispatchEvent(windowScroll);
            }));
        }
    }), 0);
    window.addEventListener("DOMContentLoaded", (() => {
        document.addEventListener("click", documentActions);
        function documentActions(e) {
            const targetElement = e.target;
            if (targetElement.closest("[data-parent]")) {
                const subMenuId = targetElement.closest("[data-parent]").dataset.parent;
                const subMenu = document.querySelector(`[data-submenu="${subMenuId}"]`);
                if (subMenu) {
                    document.documentElement.classList.add("sub-menu-open");
                    document.querySelectorAll(".menu-item-active").forEach((el => {
                        el.classList.remove("menu-item-active");
                    }));
                    document.querySelectorAll("[data-submenu]._sub-menu-open").forEach((el => {
                        el.classList.remove("_sub-menu-open");
                    }));
                    subMenu.classList.add("_sub-menu-open");
                    targetElement.closest(".menu__item").classList.add("menu-item-active");
                }
                if (targetElement.closest(".submenu__back")) {
                    document.documentElement.classList.remove("sub-menu-open");
                    document.querySelectorAll(".menu-item-active").forEach((el => {
                        el.classList.remove("menu-item-active");
                    }));
                    document.querySelectorAll("[data-submenu]._sub-menu-open").forEach((el => {
                        el.classList.remove("_sub-menu-open");
                    }));
                }
            }
            if (targetElement.closest(".submenu__back")) {
                document.documentElement.classList.remove("sub-menu-open");
                document.querySelectorAll(".menu-item-active").forEach((el => {
                    el.classList.remove("menu-item-active");
                }));
                document.querySelectorAll("[data-submenu]._sub-menu-open").forEach((el => {
                    el.classList.remove("_sub-menu-open");
                }));
            }
        }
    }));
    menuInit();
})();