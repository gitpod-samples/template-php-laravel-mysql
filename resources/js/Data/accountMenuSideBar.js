export default [
    {
        isLogout: false,
        label: "Library",
        description: "things you've saved",
        route: "library.index",
        page: "User/Library",
    },
    {
        isLogout: false,
        label: "Social Feed",
        description: "what are they up to",
        route: "discuss.index",
        page: "Feeds/Index",
    },
    {
        isLogout: false,
        label: "Profile",
        description: "it's all about you",
        route: "profile.index",
        page: "User/ProfileView",
    },
    {
        isLogout: false,
        label: "Settings",
        description: "make a tweak",
        route: "setting.account",
        page: "User/Settings/Index",
    },

    {
        isLogout: true,
        label: "Sign Out",
        description: "but... why?",
        route: "logout",
    },
];
