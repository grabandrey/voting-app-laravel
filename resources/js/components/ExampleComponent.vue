<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3  m-5 shadow-lg">
                    <div class="card-header shadow fs-1 bg-success">Voting App</div>
                    
                    <div class="card-body">
                        <input type="radio" id="1" value=1 v-model="picked" @click="updateItem1()">  
                        <label class = "fs-1 align-middle m-2 "  for="one" @click="updateItem1()" >Good</label> <span class = "fs-2 align-middle m-2"@load="dataItem1()">{{ percent1 }} </span> <span class = "fs-2 align-middle m-2" @load="dataItem1()">{{ data1 }}</span>
                        <br>
                        <input type="radio" id="2" value=2 v-model="picked" @click="updateItem2()">
                        <label class = "fs-1 align-middle m-2" for="two">Fair</label> <span class = "fs-2 align-middle m-2" @load="dataItem2()">{{ percent2 }}</span> <span class = "fs-2 align-middle m-2" @load="dataItem2()">{{ data2 }}</span>
                        <br>
                        <input type="radio" id="3" value=3 v-model="picked" @click="updateItem3()">
                        <label class = "fs-1 align-middle m-2" for="two">Neutral</label> <span class = "fs-2 align-middle m-2" @load="dataItem3()">{{ percent3 }}</span> <span class = "fs-2 align-middle m-2" @load="dataItem3()">{{ data3 }}</span>
                        <br>
                        <input type="radio" id="4" value=4 v-model="picked" @click="updateItem4()">
                        <label class = "fs-1 align-middle m-2" for="two">Bad</label> <span class = "fs-2 align-middle m-2" @load="dataItem4()">{{ percent4 }}</span> <span class = "fs-2 align-middle m-2" @load="dataItem4()">{{ data4 }}</span>
                        
                    </div>
                    <span  class = "fs-1" @load="voted_msj()">{{ voted }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            
            updateItem1(){
                axios.put('api/selection/1')
                this.dataItem1();
                this.dataItem2();
                this.dataItem3();
                this.dataItem4();
                this.voted_msj();
                
            },
            updateItem2(){
                axios.put('api/selection/2')
                this.dataItem1();
                this.dataItem2();
                this.dataItem3();
                this.dataItem4();
                this.voted_msj();
            },
            updateItem3(){
                axios.put('api/selection/3')
                this.dataItem1();
                this.dataItem2();
                this.dataItem3();
                this.dataItem4();
                this.voted_msj();
            },
            updateItem4(){
                axios.put('api/selection/4')
                this.dataItem1();
                this.dataItem2();
                this.dataItem3();
                this.dataItem4();
                this.voted_msj();
            },
            voted_msj(){
                this.voted = 'Thank you for your input'
            },
            dataItem1(){
                
                axios.get('api/selection/1')
                .then( response => {
                    this.data1 = ' - ' + response.data.counter + ' Results'
                    this.percent1 = response.data.percent + ' %'
                    document.getElementById("1").disabled = true
                })
                .catch( error =>{
                    console.log (error);
                }
                )
            },
            dataItem2(){
                axios.get('api/selection/2')
                .then( response => {
                    this.data2 = ' - ' + response.data.counter + ' Results'
                    this.percent2 = response.data.percent + ' %'
                    document.getElementById("2").disabled = true
                })
                .catch( error =>{
                    console.log (error);
                }
                )
                
            },

            dataItem3(){
                axios.get('api/selection/3')
                .then( response => {
                    this.data3 = ' - ' + response.data.counter + ' Results'
                    this.percent3 = response.data.percent + ' %'
                    document.getElementById("3").disabled = true
                })
                .catch( error =>{
                    console.log (error);
                }
                )
            },
            dataItem4(){
                axios.get('api/selection/4')
                .then( response => {
                    this.data4 = ' - ' + response.data.counter + ' Results'
                    this.percent4 = response.data.percent + ' %'
                    document.getElementById("4").disabled = true
                })
                .catch( error =>{
                    console.log (error);
                }
                )
            }
        },
        data: function(){
            return {
                
                voted: '',
                data1: '',
                data2: '',
                data3: '',
                data4: '',
                percent1: '',
                picked: ''
            }
        }
        
    }
</script>
    
<style  scoped>
    
    

    .card{
       font-size: 30px; 
       text-align: center;
       border-radius: 20px !important;
       background-image: url("https://99designs-blog.imgix.net/blog/wp-content/uploads/2018/12/Gradient_builder_2.jpg?auto=format&q=60&w=1815&h=1020.9375&fit=crop&crop=faces");
        
           

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
       
    }
    .card-header{
        border-radius: 20px !important;
        font-weight: bolder !important;
        background: rgba(0,0,0,0.3) !important;
    backdrop-filter: blur(10px) saturate(125%);
    -webkit-backdrop-filter: blur(10px) saturate(125%);
    -moz-backdrop-filter: blur(10px) saturate(125%);
    }
    .card-body{
        margin-top: 50px;
        margin-bottom: 0px !important;
        padding-bottom: 0px !important;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        font-weight: bold;
        
    }

    input[type='radio'] { 
     transform: scale(2); 
     background-color: purple !important;
     color: purple !important;
 }
    
</style>
