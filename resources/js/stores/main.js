import { defineStore } from "pinia";
import axios from "axios";

export const useMainStore = defineStore("main", {
    state: () => ({
        /* User */
        userName: "",
        userEmail: "",
        userAvatar: "",

        /* Field focus with ctrl+k (to register only once) */
        isFieldFocusRegistered: false,

        /* Sample data (commonly used) */
        clients: [
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 58,
            },
            {
                name: "Abey",
                login: "abey04",
                created: "12/5/2022",
                company: "BHU",
                city:"Addis Abab",
                progress: 50,
            },
        ],
        history: [
            {
                amount: 50,
                date: "12/12/2002",
                business: "bhu",
                type: "debit",
                name: "Abey Lulseged",
                account: "1245654",
            },
            {
                amount: 50,
                date: "12/12/2002",
                business: "bhu",
                type: "debit",
                name: "Abey Lulseged",
                account: "1245654",
            },
            {
                amount: 50,
                date: "12/12/2002",
                business: "bhu",
                type: "debit",
                name: "Abey Lulseged",
                account: "1245654",
            },
        ],
    }),
    actions: {
        setUser(payload) {
            if (payload.name) {
                this.userName = payload.name;
            }
            if (payload.email) {
                this.userEmail = payload.email;
            }
            if (payload.avatar) {
                this.userAvatar = payload.avatar;
            }
        },

        fetch(sampleDataKey) {
            axios
                .get(`data-sources/${sampleDataKey}.json`)
                .then((r) => {
                    if (r.data && r.data.data) {
                        this[sampleDataKey] = r.data.data;
                    }
                })
                .catch((error) => {
                    alert(error.message);
                });
        },
    },
});
