<template>
    <div class="container mb-5">
        <div class="mt-5">
            <h1>Github Starred Repos</h1>
        </div>
        <div>
            <b-form class="d-flex inline-form" @submit="getStarredRepos($event)">
                <label class="sr-only d-none" for="inline-form-input-name">Access Token</label>
                <b-form-input
                    id="inline-form-input-name"
                    class="mb-2"
                    placeholder="Enter Access Token"
                    v-model="currentUser.token"
                    :required="true"
                ></b-form-input>
                <b-button type="submit" :disabled="isDisabled(currentUser.token)" variant="primary">
                    <span v-if="loading">Getting your data..</span>
                    <span v-if="!loading">Get Starred Repos</span>
                </b-button>
            </b-form>
        </div>
        <div v-if="!currentUser.token">
            <b-alert show variant="info">No Token? <a href="https://docs.github.com/en/github/authenticating-to-github/keeping-your-account-and-data-secure/creating-a-personal-access-token">Click here to learn how to make token.</a></b-alert>
        </div>
        <div>
            <b-table striped hover :items="items"></b-table>
        </div>
    </div>
</template>
<script>
  export default {
    props: ['user'],
    data() {
      return {
        currentUser: JSON.parse(this.user),
        loading: false,
        items: [],
        errorMessage: ''
      }
    },
    computed: {},
    methods: {
        isDisabled(data){
            return data.length == 0;
        },
        getStarredRepos(event){
            event.preventDefault();
            this.loading = true;
            this.items = [];
            this.errorMessage = '';
            axios.post('/user/starred-repos', this.currentUser)
                .then(response => {
                    this.loading = false;
                    let starred_repos = response.data.starred_repos;
                    starred_repos.forEach(repo => {
                        this.items.push({
                            ID: repo.id,
                            Name: repo.full_name,
                            Watchers: repo.watchers_count
                        })
                    })
                })
                .catch(error => {
                    this.loading = false;
                    if(error.response.status === 401){
                        let message = error.response.data.message;
                        this.$bvToast.toast(`Message: ${message}`, {
                            title: 'Error',
                            variant: 'danger',
                            autoHideDelay: 50000,
                        });
                    }
                })
        }
    }
  }
</script>