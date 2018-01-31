<template>
    <div>
        <div class="well">
            <input type="text" class="form-control" placeholder="Search the list" v-model="filterTerm">
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
            <tr v-for="item in filteredAndOrderedItems">
                <th scope="row">{{ item.id }}</th>
                <td>{{ item.title }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.created_at }}</td>
                <td class="btn-toolbar">
                    <div class="btn-group mr-2">
                        <a class="btn btn-xs btn-warning">Editar</a>
                    </div>
                    <div class="btn-group mr-2">
                        <!--{!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']); !!}-->
                        <!--<button type="submit" class="btn btn-danger">Remover</button>-->
                        <!--{!! Form::close(); !!}-->
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['items'],

        data () {
            return {
                list: [],
                sortProperty: 'title',
                sortDirection: 'asc',
                filterTerm: ''
            }
        },

        mounted () {
            this.list = JSON.parse(this.items)
        },

        computed: {
            orderedItems: function () {
                return _.orderBy(this.list, this.sortProperty, this.sortDirection)
            },
            filteredUsers: function () {
                var self = this
                return self.list.filter(function (item) {
                    return item.title.indexOf(self.filterTerm) !== -1
                })
            },
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
            }
        }
    }
</script>

<style scoped>

</style>