let getters = {
    posts: state => {
        return state.posts
    },
    fullName: (state) => {
        return state.a + ' ' + state.b
    }
}

export default  getters
