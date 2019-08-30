<template>
    <div class="message-wrapper">
        <v-list  v-if="contact">
            <v-list-tile  v-for="message in messages" :key="message.id">
                <div v-if="message.message" >
                    <v-chip :color="(contact.id===message.user_id)?'green':'red'" text-color="white">
                        <v-list-tile-content>
                            <v-list-tile-title>{{message.message}}</v-list-tile-title>
                            <v-list-tile-sub-title class="text-xs-right caption"><small class="text-secondary">{{message.created_at | diffForHumans}}</small></v-list-tile-sub-title>
                        </v-list-tile-content>

                    </v-chip>
                </div>

                <div class="image-container">
                    <img v-if="message.image"  :src="'/storage/'+message.image" alt="">
                </div>
            </v-list-tile>
        </v-list>
    </div>
</template>

<script>
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        },
        created() {
            dayjs.extend(relativeTime);
        },

        filters: {
            diffForHumans: (date) => {
                if (!date){
                    return null;
                }
                return dayjs(date).fromNow();
            }
        }
    }
</script>

<style scoped>
.chat-card{
  margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}

.message-wrapper {
  min-height: 80%;
  max-height: 90%;
    /* height: ; */
    /* max-height: 50%; */
}
 .received {
    text-align: right;
}
/* .text-message-container {
    display:flex
} */
.sent {
    text-align: left;
}
</style>

<style lang="scss" scoped>
.feed {
    background: #f0f0f0;
    overflow-y: scroll;
    overflow-x: none;

    ul {
        list-style-type: none;
        padding: 5px;

        li {
            &.message {
                margin: 10px 0;
                width: 100%;

                .text {
                    max-width: 200px;
                    border-radius: 5px;
                    padding: 12px;
                    display: inline-block;
                }

                &.received {
                    text-align: right;

                    .text {
                        background: #b2b2b2;
                    }
                }

                &.sent {
                    text-align: left;

                    .text {
                        background: #81c4f9;
                    }
                }
            }
        }
    }
}
</style>

