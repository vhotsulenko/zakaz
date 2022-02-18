<template>
     <div class="uk-overflow-auto">
          
   <table class="uk-table uk-table-hover uk-table-divider">
        <thead>
            <tr>
                <th class="uk-table-shrink">ID</th>
                <th>Код</th>
                <th>Название</th>
                <th>Ед.изм</th>
                <th>Кол-во</th>
                <th>Цена опт</th>
                <th>Цена розн</th>
                <th>Вес</th>
                <th>Вес всего</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="pos in tovar"     :key="pos.list">
                <td >{{ pos.id }}</td>
                 <td >{{ pos.code }}</td>
                 <td >{{ pos.name }}</td>
                  <td >{{ pos.edizm }}</td>
                      <td ><input 
                                type="numeric"
                                @keyup.enter="addItem" ref="myInput"
                                 v-model="pos.kol"
                        ></td>
                    <td >{{ pos.pr_opt }}</td>
                    <td >{{ pos.pr_roz }}</td>
                    <td >{{ pos.ves }}</td>
                    <td >{{ pos.ves*pos.kol }}</td>
            </tr>
          </tbody>
          <tfoot>
              <tr>
                  <td colspan="7"> </td>
                  <td> Вес всего:</td>
                  <td>{{ fVesVsego }}</td>
              </tr>
          </tfoot>
    </table>
     </div>
     
</template>

<script>
import Layout from '@/Shared/Layout'
    // import axios from'axios';
    export default {
 layout: Layout,
            data: () => ({
            tovar: [ 
              { id:1, code:"СЦ1", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:2, code:"СЦ2", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:3, code:"СЦ3", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },

            ]

            
        }),
        methods: {
            addItem()  {
                this.tovar.kol = this.$refs.myInput.value
                  
    },
        },
        computed: {
                    fVesVsego: function () {
                        var tbSumVes = 0;
                     //    for (var i=0(tbSumVes,i) in tovar) {
                          for (var i = 0; i < this.tovar.length; ++i) {
                         tbSumVes = tbSumVes + this.tovar[i].ves * this.tovar[i].kol
                          }
                        
                        return tbSumVes
                        }
                    }

        
        // mounted() {
        //     this.loadPosts();
        // },
        // methods: {
        //     loadPosts() {
        //         axios.get('/api/posts')
        //         .then(res=>{
        //             console.log(res.data);
        //             this.posts = res.data;
        //         }

        //         )
        //     }
        // }
        }
    
</script>
<style scoped>

</style>
      
     