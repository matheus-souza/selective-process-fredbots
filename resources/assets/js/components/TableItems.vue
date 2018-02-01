<template>
    <div>
        <div class="navbar justify-content-between">
            <h1 class="navbar-brand">Items</h1>
            <form class="form-inline">
                <input type="text" class="form-control float-right" placeholder="Search the list" v-model="filterTerm" />
            </form>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><a href="#" @click="sort($event, 'id')">#</a></th>
                <th scope="col"><a href="#" @click="sort($event, 'title')">Title</a></th>
                <th scope="col"><a href="#" @click="sort($event, 'name')">Name</a></th>
                <th scope="col"><a href="#" @click="sort($event, 'created_at')">DateTime</a></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in filteredAndOrderedItems"  @click="toggle(item)">
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.title }}</td>
                <td>{{ item.user.name }}</td>
                <td>{{ item.created_at }}</td>
                <td class="btn-toolbar">
                    <div class="btn-group mr-2">
                        <a v-if="block_edit_list[item.id]" class="btn btn-xs btn-warning disabled" :href="url_edit_list[item.id]">Edit</a>
                        <a v-else class="btn btn-xs btn-warning" :href="url_edit_list[item.id]">Edit</a>
                    </div>
                    <div class="btn-group mr-2">
                        <form v-if="!block_delete_list[item.id]" method="POST" :action="url_delete_list[item.id]" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" :value="csrf">
                            <button type="submit" class="btn btn-danger">Del</button>
                        </form>
                        <a v-else class="btn btn-xs btn-danger disabled" :href="url_edit_list[item.id]">Del</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['items', 'url_delete', 'url_edit', 'url_show', 'block_edit', 'block_delete'],

        data () {
            return {
                list: [],
                url_delete_list: [],
                url_edit_list: [],
                sortProperty: 'title',
                sortDirection: 'asc',
                filterTerm: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },

        mounted () {
            this.list = JSON.parse(this.items)
            this.url_delete_list = JSON.parse(this.url_delete)
            this.url_edit_list = JSON.parse(this.url_edit)
            this.url_show_list = JSON.parse(this.url_show)
            this.block_edit_list = JSON.parse(this.block_edit)
            this.block_delete_list = JSON.parse(this.block_delete)
        },

        computed: {
            filteredAndOrderedItems: function () {
                const filter = this.filterTerm;
                const clist = _.orderBy(this.list, this.sortProperty, this.sortDirection);

                if (_.isEmpty(filter)) {
                    return clist;
                }

                return _.filter(clist, list => list.title.indexOf(filter) >= 0);
            }
        },

        methods: {
            sort(ev, property) {
                ev.preventDefault()

                this.sortProperty = property
                if (this.sortDirection == 'asc') {
                    this.sortDirection = 'desc'
                } else {
                    this.sortDirection = 'asc'
                }
            },
            toggle: function (clicked) {
                window.location.href = this.url_show_list[clicked.id]
            }
        }
    }
</script>

<style scoped>

</style>