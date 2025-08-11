import ContactTable from "./components/ContactTable.vue";
import ContactDetail from "./components/ContactDetail.vue";

const { locales } = window.AsgardCMS;

export default [
    {
        path: "/contact/contacts",
        name: "admin.contact.contact.index",
        component: ContactTable,
    },
    {
        path: "/contact/contacts/:contactId/edit",
        name: "admin.contact.contact.edit",
        component: ContactDetail,
        props: {
            locales,
            contactTitle: "edit contact",
        },
    },
];
