export default [
    {
        menu: [
            {
                label: "Books",
                title: "browse",
                description: "deep dives",
                route: "books.index",
                page: "Books/Index",
            },
            {
                label: "Topics",
                title: "find",
                description: "pick a category",
                route: "browse.all",
                page: "Topics/Index",
            },
            {
                label: "Lectures",
                title: "find",
                description: "find your interest",
                route: "lectures.index",
                page: "Lectures/Index",
            },
            {
                label: "Publications",
                title: "access",
                description: "enhance your knowledge",
                route: "publications.index",
                page: "Publication/Index",
            },
            {
                label: "Forum",
                title: "discuss",
                description: "engage the community",
                route: "discuss.index",
                page: "Feeds/Index",
            },
            {
                label: "Library",
                title: "manage",
                description: "things you've saved",
                route: "library.index",
                page: "User/Library",
            },
        ],
    },
    {
        stats: [
            {
                label: "Books",
                title: "books",
                description: "books in our gallary",
                route: "books.index",
                page: "Books/Index",
            },
            {
                label: "Lectures",
                title: "lectures",
                description: "detailed lectures",
                route: "lectures.index",
                page: "Lectures/Index",
            },
            {
                label: "Publications",
                title: "publications",
                description: "publications from our staffs",
                route: "publications.index",
                page: "Publication/Index",
            },
        ],
    },
];
