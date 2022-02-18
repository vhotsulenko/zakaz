<template>
    <div>
        <data-table v-bind="bindings"/>
    </div>
</template>
<script>
//import { Head } from '@inertiajs/inertia-vue3'


import Layout from '@/Shared/Layout'

export default {
  components: {
    Head, DataTable
  },
  layout: Layout,

  data: () => ({
            tovar: [ 
              { id:1, code:"СЦ1", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:2, code:"СЦ2", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:3, code:"СЦ3", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },

            ]

            
        }),
        computed: {
        bindings() {
            return {
                columns: [
                    { 
                        key: "id",
                        title: "id",
                        sortable: false,
                        searchable: false
                    },
                    {
                        key: "code",
                         title: "Код",
                         showEntriesInfo: true,
                         sortable: true,
                         searchable: true,
                         editable: true
                    },   
                    {
                        key: "name",
                         title: "kol",
                         showEntriesInfo: true,
                         sortable: true,
                         searchable: true,
                         editable: true
                    },   
                    {
                        key: "edizm",
                        title: "Boddy",
                        searchable: false
                    },
                    {
                        key: "kol",
                        title: "Boddy",
                        searchable: false
                    },
                    {
                        key: "pr_opt",
                        title: "Boddy",
                        searchable: false
                    },
                    {
                        key: "pr_roz",
                        title: "Boddy",
                        searchable: false
                    },
                    {
                        key: "ves",
                        title: "Boddy",
                        searchable: false
                    }
                        ],
                data: this.tovar
               
            }
        }
    },
        }
        
</script>




