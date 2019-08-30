<template>
    <div class="composer">
        <v-layout row >
            <v-flex class="ml-2 text-right" xs1>
                <v-btn @click="toggleEmo" fab dark small color="pink">
                    <v-icon>insert_emoticon </v-icon>
                </v-btn>
            </v-flex>

            <v-flex xs1 class="text-center">
                <file-upload :post-action="'/private-messages/'+activeFriend" ref='upload' v-model="files" @input-file="$refs.upload.active = true" :headers="{'X-CSRF-TOKEN': token}">
                    <v-icon class="mt-3">attach_file</v-icon>
                </file-upload>
            </v-flex>
            <v-flex xs8 >
                <v-text-field rows=2 v-model="message" label="Enter Message" single-line @keyup.enter="send" ></v-text-field>
            </v-flex>

            <v-flex xs2>
                <v-btn @click="send" dark class="mt-3 ml-2 white--text" small color="green">send</v-btn>
            </v-flex>
        </v-layout>
        <!-- <v-text-field rows=2 v-model="message" label="Enter Message" single-line @keyup.enter="send" ></v-text-field> -->
        <!-- <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea> -->
    </div>

</template>

<script>
  import { Picker } from 'emoji-mart-vue'

    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            },
            toggleEmo(){
                this.emoStatus= !this.emoStatus;
            },
        }
    }
</script>

<style lang="scss" scoped>
.composer textarea {
    width: 100%;
    // margin: 10px;
    resize: none;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding: 6px;
}
</style>

