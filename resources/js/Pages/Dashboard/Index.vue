<template>

     <div class="uk-overflow-auto">
         
      <p>{{ inputValue }}</p>  <button v-on:click="scrollToElement(15)">
    Smooth scroll to first element with class of .index-50
  </button>
   <table class="uk-table uk-table-hover uk-table-divider" >
       
        <thead>
            <tr>
                <th class="uk-table-shrink">ID</th>
                <th class="uk-table-shrink">Код</th>
                <th class="uk-table-shrink uk-text-nowrap" >Название</th>
                <th  class="uk-table-shrink uk-text-nowrap">Ед.изм</th>
                <th class="uk-table-shrink uk-text-nowrap" v-on:click="ChangeState">Кол-во <span class="uk-margin-small-right" :uk-icon="showIcon"></span></th>
                <th  class="uk-table-shrink uk-text-nowrap">Цена опт</th>
                <th  class="uk-table-shrink uk-text-nowrap">Цена розн</th>
                <th  class="uk-table-shrink uk-text-nowrap">Вес</th>
                <th  class="uk-table-shrink uk-text-nowrap">Вес всего</th>
            </tr>
        </thead>
     
        <tbody>
            <tr v-show="(show || pos.kol > 0) " v-for="(pos,index) in tovar"     :key="pos.list" :class="`index-${index}`">
                <td >{{ pos.id }}</td>
                 <td >{{ pos.code }}</td>
                 <td class="uk-text-nowrap">{{ pos.name }}</td>
                  <td class="uk-text-nowrap">{{ pos.edizm }}</td>
                      <td ><input 
                                type="number"
                                size="1"
                                min="0"
                                @keyup.enter="addItem" ref="myInput"
                                 v-model="pos.kol"
                                 
                        ></td>
                    <td class="uk-text-nowrap">{{ pos.pr_opt }}</td>
                    <td class="uk-text-nowrap">{{ pos.pr_roz }}</td>
                    <td class="uk-text-nowrap">{{ pos.ves }}</td>
                    <td class="uk-text-nowrap">{{ (Number(pos.ves) * Number(pos.kol)).toFixed(2) }}</td>
            </tr>
          </tbody>
          <tfoot>
             
              <tr id="box">
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
//import SearchSelect from '@/Shared/SearchSelect'
//import { ref, computed } from 'vue'
    // import axios from'axios';
    export default {
      layout: Layout,
      // components:  {
        
      //   SearchSelect,
      // },
 

            data: () => ({
                show: true,
                active: false,
              //  inputValue: '',
            tovar: [ 
              { id:1, code:"СЦ1", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:2, code:"СЦ2", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:3, code:"СЦ3", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
              { id:4, code:"СЦ4", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:5, code:"СЦ5", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:6, code:"СЦ6", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
              { id:7, code:"СЦ7", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:8, code:"СЦ8", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:9, code:"СЦ9", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
              { id:10, code:"СЦ10", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:11, code:"СЦ11", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:12, code:"СЦ12", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
              { id:13, code:"СЦ13", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:14, code:"СЦ14", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
              { id:15, code:"СЦ15", name:"Зчіпка Zirka-105, «Зубр-105», «Булат» (Ø-18,5; L-60)", edizm:"шт", kol: 2, pr_opt: 540, pr_roz: 600, ves: 4.5 },
              { id:16, code:"СЦ16", name:"Зчіпка Zirka-61 коротка (Ø-21; L-94)", edizm:"шт", kol: 0, pr_opt: 740, pr_roz: 900, ves: 4.7 },
              { id:17, code:"СЦ17", name:"Зчіпка Zirka-61 подовжена (Ø-21; L-94)", edizm:"шт", kol: 3, pr_opt: 240, pr_roz: 300, ves: 2.5 },
            ]
            
        }),

        props: {
    
          inputValue: String,
    //    maxWidth: {
    //    type: Number,
    //   default: 300,
    //  },
          },

        methods: {
            addItem()  {
                this.tovar.kol = this.$refs.myInput.value
                  
    },
    ChangeState: function() {
            this.show = !this.show;
         },
       
       scrollToElement(ind) {
      const el = this.$el.getElementsByClassName('index-'+ind)[0];
      
      if (el) {
        el.scrollIntoView({behavior: 'smooth'});
      }
  },
        },
        mounted() {
           //  const labelInputRef = this.$refs.labelInput;
           //   labelInputRef.focus();
           //   scrollToElement();
        },
        computed: {
                    fVesVsego: function () {
                        var tbSumVes = 0;
                     //    for (var i=0(tbSumVes,i) in tovar) {
                          for (var i = 0; i < this.tovar.length; ++i) {
                         tbSumVes = tbSumVes + Number(this.tovar[i].ves) * Number(this.tovar[i].kol)
                          }
                        
                        return tbSumVes.toFixed(2);
                        },
            showIcon: function () {
                
                    if (this.show) { return "list"} else {return "table"}
                  
                    
              },
           //   inputValues: function()  {
        //            const namess = this.tovar.map(el => el.code);
        //            var linp = "СЦ2";
        //            linp = this.$refs.labelInput.value;
        //       console.log(linp);
        //      return (namess.indexOf(linp))
        //    },
    // сеттер:
                        //   set: function (newValue) {
                        //     var names = newValue.split(' ')
                        //     this.firstName = names[0]
                        //     this.lastName = names[names.length - 1]
    // }
 // } 
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
.thov:hover { 
    background: #a2e1e6; /* Цвет фона */
   }
</style>
      