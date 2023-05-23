import {
    people01,
    people02,
    people03,
    facebook,
    instagram,
    linkedin,
    twitter,
    shield,
    iconMobile,
    iconWorkshop,
    iconBroadcasts,
    iconDigitalHubs,
    iconChat,
    robot,
    heroImageV2,
    heroImageV3,
} from "../../../assets/WelcomePage/index";

export const navLinks = [
    {
        id: "home",
        title: "Home",
    },
    {
        id: "about_bhudil_cta_area",
        title: "About",
    },
    {
        id: "communities",
        title: "Communities",
    },
    {
        id: "features",
        title: "Features",
    },
    {
        id: "testimonials",
        title: "Testimonials",
    },
];
export const hero = {
    description: "BHUDiL is more than just a community building platform. It is a powerful tool that empowers knowledge seekers to find and share books, research ideas, information and knowledge. With its easy-to-use interface, BHUDiL makes it easy for users to connect with each other and exchange ideas and information. Whether you are looking for a specific book, research paper or just want to explore new ideas, BHUDiL is the perfect place for you.",
    subHeading: "BHUDiL is a place for students, staff and the local community to acquaint with each other and share books and research idea",
    heroImage:heroImageV3,

  };

export const features = [
    {
        id: "feature-1",
        icon: iconDigitalHubs,
        title: "Digital Hubs",
        content:
            "Everything you need, all in one place. Join discussions, upload content, and be the first to know about new updates",
    },
    {
        id: "feature-2",
        icon: shield,
        title: "100% Secured",
        content:
            "We take proactive steps make sure your information and activities are secure.",
    },
    {
        id: "feature-3",
        icon: iconChat,
        title: "Live Chat",
        content:
            "Talk with friends or groups via text without leaving the platform. Different medias are supported; use wisely.",
    },
    {
        id: "feature-4",
        icon: iconBroadcasts,
        title: "Upload Lectures",
        content:
            "Upload your lectures with the click of a button, and share your knowledge with friends or the rest of the community.",
    },
    {
        id: "feature-5",
        icon: iconWorkshop,
        title: "BHUDiL Community",
        content:
            "Create, discover, and interact with communities of your interest and share ideas and materials with them.",
    },
    {
        id: "feature-6",
        icon: iconMobile,
        title: "Responsive Web Design",
        content:
            "The responsive design will enable you to access our service from your iOS or Android device.",
    },
];

export const feedback = [
    {
        id: "feedback-1",
        content:
            "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis nostrum omnis quasi doloremque consectetur.",
        name: "Herman Jensen",
        title: "Student",
        img: people01,
    },
    {
        id: "feedback-2",
        content:
            "Voluptas totam corporis dolor nobis ad atque minima, aperiam nihil iusto. Aliquid laborum veniam nisi recusandae.",
        name: "Steve Mark",
        title: "Academic Staff",
        img: people02,
    },
    {
        id: "feedback-3",
        content:
            "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, aliquam facilis tempora eligendi expedita nisi pariatur provident. ",
        name: "Kenn Gallagher",
        title: "Student",
        img: people03,
    },
];

export const stats = [
    {
        id: "stats-1",
        title: "Active Students",
        value: "3800+",
    },
    {
        id: "stats-2",
        title: "Active Staffs",
        value: "230+",
    },
    {
        id: "stats-3",
        title: "Books",
        value: "2300+",
    },
];

export const footerLinks = [
    {
        title: "Useful Links",
        links: [
            {
                name: "Login",
                auth: true,
                link: "login",
            },
            {
                name: "Register",
                auth: true,
                link: "register",
            },
            {
                name: "Logout",
                auth: false,
                link: "logout",
            },
            {
                name: "About",
                auth:false,
                link: "about.index",
            },
            {
                name: "Terms",
                auth:false,
                link: "terms.index",
            },
            {
                name: "Privacy",
                auth:false,
                link: "privacy.index",
            },
        ],
    },
    {
        title: "Community",
        links: [
            {
                name: "Help Center",
                auth:false,
                link: "contact.index",
            },
            {
                name: "Discussion Forums",
                auth:false,
                link: "discuss.index",
            },
            {
                name: "Groups",
                auth:false,
                link: "groups.index",
            },
            {
                name: "Publications",
                auth:false,
                link: "publications.index",
            },
            {
                name: "Newsletters",
                auth:false,
                link: "newsletters.index",
            },
        ],
    },
    {
        title: "Help Center",
        links: [
            {
                name: "Contact Us",
                auth:false,
                link: "contact.index",
            },
            {
                name: "Our Partner",
                auth:false,
                link: "partners.index",
            },
            {
                name: "Become a Partner",
                auth:false,
                link: "partners.register",
            },
        ],
    },
];

export const socialMedia = [
    {
        id: "social-media-1",
        icon: instagram,
        link: "https://www.instagram.com/",
    },
    {
        id: "social-media-2",
        icon: facebook,
        link: "https://www.facebook.com/",
    },
    {
        id: "social-media-3",
        icon: twitter,
        link: "https://www.twitter.com/",
    },
    {
        id: "social-media-4",
        icon: linkedin,
        link: "https://www.linkedin.com/",
    },
];
