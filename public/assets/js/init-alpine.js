function data() {
    function getThemeFromLocalStorage() {
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'));
      }
      return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
      );
    }

    function setThemeToLocalStorage(value) {
      window.localStorage.setItem('dark', value);
    }

    function handleResize() {
      if (window.innerWidth >= 768) {
        this.isSideMenuOpen = false;
      }
    }

    return {
      dark: getThemeFromLocalStorage(),
      toggleTheme() {
        this.dark = !this.dark;
        setThemeToLocalStorage(this.dark);
      },
      isSideMenuOpen: false,
      toggleSideMenu() {
        this.isSideMenuOpen = !this.isSideMenuOpen;
      },
      closeSideMenu() {
        this.isSideMenuOpen = false;
      },
      isNotificationsMenuOpen: false,
      toggleNotificationsMenu() {
        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
      },
      closeNotificationsMenu() {
        this.isNotificationsMenuOpen = false;
      },
      isProfileMenuOpen: false,
      toggleProfileMenu() {
        this.isProfileMenuOpen = !this.isProfileMenuOpen;
      },
      closeProfileMenu() {
        this.isProfileMenuOpen = false;
      },
      isPagesMenuOpen: false,
      togglePagesMenu() {
        this.isPagesMenuOpen = !this.isPagesMenuOpen;
      },

      isModalOpen: false,
      trapCleanup: null,
      openModal() {
        this.isModalOpen = true;
        this.trapCleanup = focusTrap(document.querySelector('#modal'));
      },
      closeModal() {
        this.isModalOpen = false;
        this.trapCleanup();
      },
      init() {
        window.addEventListener('resize', () => {
          handleResize.call(this);
        });

        handleResize.call(this);
      },
    };
  }
