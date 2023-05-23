import {
    mdiMonitor,
    mdiCollage,
    mdiAccount,
    mdiAccountBadge,
    mdiAccountEye,
    mdiAccountPlus,
    mdiAccountSchool,
    mdiSchool,
    mdiChairSchool,
    mdiAccountStar,
    mdiBook,
    mdiListStatus,
    mdiPaperRoll,
    mdiGroup,
} from "@mdi/js";

export default [
    {
        icon: mdiMonitor,
        href: "admin.index",
        label: "Dashboard",
    },
    {
        icon: mdiAccount,
        label: "Users",
        href: "admin.users.index",
    },
    {
        icon: mdiAccountBadge,
        label: "User Type",
        href: "admin.user-types.index",
    },
    {
        icon: mdiAccountSchool,
        label:"Academic Rank",
        href: "admin.academic-ranks.index",
    },
    {
        icon: mdiAccountStar,
        label: "Academic Year",
        href: "admin.academic-years.index",
    },
    {
        icon: mdiSchool,
        label: "Academic Program",
        href: "admin.academic-programs.index",
    },
    {
        icon: mdiChairSchool,
        label: "Enrollment Type",
        href: "admin.enrollment-types.index",
    },
    {
        icon: mdiCollage,
        label: "Collages",
        href: "admin.collages.index",
    },
    {
        icon: mdiCollage,
        label: "Departments",
        href: "admin.departments.index",
    },
    {
        icon: mdiBook,
        label: "Books",
        href: "admin.books.index",
    },

    {
        icon: mdiListStatus,
        label: "Topics",
        href: "admin.topics.index",
    },
    {
        icon:mdiBook,
        label: "Lectures",
        href: "admin.lectures.index",

    },
    {
        icon:mdiPaperRoll,
        label: "Publications",
        href: "admin.publications.index",
    },
    {
        icon:mdiGroup,
        label: "Forum",
        route: "admin.discuss.index",
    },
];
