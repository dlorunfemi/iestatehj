<template>
    <v-app class="chat-app">
        <v-content>
            <v-container>
                <v-toolbar>
                    <v-toolbar-title>Messages</v-toolbar-title>
                </v-toolbar>
                <v-card>
                    <v-layout >
                        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
                        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
                    </v-layout>
                </v-card>
            </v-container>
        </v-content>
        <v-footer></v-footer>
    </v-app>
    <!-- <div class="chat-app">
    </div> -->
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                onlineFriends:[],
                contacts: []
            };
        },
        mounted() {
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });

            axios.get('/admin/messages/users')
                .then((response) => {
                    this.contacts = response.data;
                });
        },
        methods: {
            startConversationWith(contact) {
                this.updateUnreadCount(contact, true);

                axios.get(`/admin/messages/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(message) {
                this.messages.push(message);
            },
            hanleIncoming(message) {
                if (this.selectedContact && message.user_id == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }

                this.updateUnreadCount(message.from_contact, false);
            },
            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;
                })
            }
        },

        components: {Conversation, ContactsList}
    }
</script>


<style lang="scss" scoped>
.chat-app {
    height: 50%;
        overflow-y: none;


}
</style>
