<template>
    <form action="" @submit="createPost(post)">
        <h4 class="text-center font-weight-bold">Post creation form</h4>
        <div class="form-group">
            <input type="text" placeholder="Post title" v-model="post.title" class="form-control">

        </div>
        <div class="form-group">
            <textarea v-model="post.content" placeholder="Post content" class="form-control"></textarea>

        </div>
        <div class="form-group">
            <button
                :disabled="!isValid"
                class="btn btn-block btn-primary"
                @click.prevent="createPost(post)"
            >
                Submit
            </button>
        </div>
        <h4 class="text-center font-weight-bold">Example</h4>
        <h5 class="text-center font-weight-bold">{{ getVariableFromStore }}</h5>
        <h5 class="text-center font-weight-bold">{{ map_state_variables }}</h5>
        <h5 class="text-center font-weight-bold">{{ another_map_state_variables }}</h5>
        <h5 class="text-center font-weight-bold">{{ fullName }}</h5>
        <h5 class="text-center font-weight-bold">Opt: {{ $options.customOpt }}</h5>

    </form>
</template>

<script>
import {mapGetters, mapState} from "vuex";

export default {
    name: "CreatePost",
    customOpt: "Opt in Created Post",
    data() {
        return {
            post: {
                title: '',
                content: '',
            }
        }
    },
    methods: {
        createPost(post) {
            this.$store.dispatch('createPost', post)
        }
    },

    computed: {
        isValid() {
            return this.post.title !== '' && this.post.content !== ''
        },
        getVariableFromStore() {
            // напрямую обращается к $store для чтения пременной
            return this.$store.state.any_variable;
        },
        ...mapState([
            // проксирует в this.map_state_variables() доступ к store.state.map_state_variables
            'map_state_variables',
            'another_map_state_variables',
        ]),
        ...mapGetters([
           'fullName',
        ]),
    },

}
</script>

<style scoped>
.form-group {
    padding: 0.7em;
}
</style>
