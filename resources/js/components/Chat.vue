<template>
  <v-container>
    <v-toolbar>
      <v-toolbar-title>Messages</v-toolbar-title>
    </v-toolbar>

    <v-card>
        <v-list>
            <message-list :user="user" :all-messages="allMessages"></message-list>
        </v-list>

              <div class="floating-div">
          <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />
        </div>
      <v-layout row >
            <v-flex class="ml-2 text-right" xs1>
                <v-btn @click="toggleEmo" fab dark small color="pink">
                    <v-icon>insert_emoticon </v-icon>
                </v-btn>
            </v-flex>

            <v-flex xs1 class="text-center">
                <file-upload post-action="/admin/messages" ref='upload' @input-file="$refs.upload.active = true" :headers="{'X-CSRF-TOKEN': token}">
                    <v-icon class="mt-3">attach_file</v-icon>
                </file-upload>
            </v-flex>
            <v-flex xs6 >
                <v-text-field
                  rows=2  v-model="message" label="Enter Message" single-line @keyup.enter="sendMessage"></v-text-field>
            </v-flex>
            {{message}}
            <v-flex xs4>
                <v-btn v-on:click="sendMessage" dark class="mt-3 ml-2 white--text" small color="green">send</v-btn>
            </v-flex>

          </v-layout>



        </v-card>
  </v-container>
</template>



<script>
  import { Picker } from 'emoji-mart-vue'
  import MessageList from './_message-list'
  export default {
    props:['user'],
    components:{
      Picker,
      MessageList
    },

    data () {
      return {
        message:null,
        emoStatus:false,
        myText:null,
        allMessages:[],
        token:document.head.querySelector('meta[name="csrf-token"]').content
      }
    },

    methods:{
      sendMessage(){

        //check if there message
        if(!this.message){
          return alert('Please enter message');
        }

          axios.post('/admin/messages', {message: this.message}).then(response => {
                    this.message=null;
                    this.emoStatus=false;
                    this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
          });
      },
      fetchMessages() {
            axios.get('/admin/messages').then(response => {
                this.allMessages = response.data;

            });
        },

      scrollToEnd(){
        window.scrollTo(0,99999);
      },
      onInput(e){
        if(!e){
          return false;
        }
        if(!this.message){
          this.message=e.native;
        }else{
          this.message=this.message + e.native;
        }
      },
      toggleEmo(){
            this.emoStatus= !this.emoStatus;
      }

    },

    mounted(){
    },

    created(){
      this.fetchMessages();

      Echo.private('lchat')
      .listen('MessageSent',(e)=>{
          this.allMessages.push(e.message)
          setTimeout(this.scrollToEnd,100);

      });

    }

  }
</script>



<style scoped>
    /* .container{max-width:1170px; margin:auto;} */
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}

    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    /* .messaging { padding: 0 0 50px 0;} */
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }
</style>
