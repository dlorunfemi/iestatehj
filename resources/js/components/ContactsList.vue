<template>
  <v-flex class="online-users" xs4>
    <v-list subheader>
      <v-subheader>Contact List</v-subheader>
      <v-list-tile
        v-for="contact in sortedContacts"
        avatar
        :key="contact.id"
        @click="selectContact(contact)"
        :class="{ 'selected': contact == selected }"
      >
        <v-list-tile-avatar>
          <img :src="'/images/' + contact.profile_image" :alt="contact.name" />
        </v-list-tile-avatar>

        <v-list-tile-content>
          <v-list-tile-title v-html="contact.name"></v-list-tile-title>
          <v-list-tile-sub-title v-html="contact.email"></v-list-tile-sub-title>
        </v-list-tile-content>

        <v-list-tile-action>
          <v-badge overlap color="grey">
            <template v-slot:badge v-if="contact.unread">
              <samll class="text-xs-center caption">{{ contact.unread }}</samll>
            </template>
            <v-icon :color="contact.unread ? 'teal' : 'grey'">chat_bubble</v-icon>
          </v-badge>
        </v-list-tile-action>
      </v-list-tile>
    </v-list>
  </v-flex>
</template>

<script>
export default {
  props: {
    contacts: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      selected: this.contacts.length ? this.contacts[0] : null
    };
  },
  methods: {
    selectContact(contact) {
      this.selected = contact;

      this.$emit("selected", contact);
    }
  },
  computed: {
    sortedContacts() {
      return _.sortBy(this.contacts, [
        contact => {
          if (contact == this.selected) {
            return Infinity;
          }

          return contact.unread;
        }
      ]).reverse();
    }
  }
};
</script>
<style scoped>

.selected {
  background: green;
}
</style>
