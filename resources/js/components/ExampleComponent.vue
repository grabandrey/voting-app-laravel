<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voting App</div>

                    <div class="card-body">
                        <input type="radio" id="1" value="1" v-model="picked" @click="updateItem1()">  
                        <label for="one">Good</label> <span @load="percentItem1()">{{ percent1 }}</span> <span @load="dataItem1()">{{ data1 }}</span>
                        <br>
                        <input type="radio" id="2" value="2" v-model="picked" @click="updateItem2()">
                        <label for="two">Fair</label> <span>{{ percent2 }}</span> <span @load="dataItem2()">{{ data2 }}</span>
                        <br>
                        <input type="radio" id="3" value="3" v-model="picked" @click="updateItem3()">
                        <label for="two">Neutral</label> <span>{{ percent3 }}</span> <span @load="dataItem3()">{{ data3 }}</span>
                        <br>
                        <input type="radio" id="4" value="4" v-model="picked" @click="updateItem4()">
                        <label for="two">Bad</label> <span>{{ percent4 }}</span> <span @load="dataItem4()">{{ data4 }}</span>
                        <br>
                        <span @load="voted_msj()">{{ voted }}</span>

                        
                    </div>
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
                this.percentItem1();
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
            percentItem1(){

                this.percent1 = this.dataItem1();
            },
            voted_msj(){
                this.voted = 'Thank you for your input'
            },
            dataItem1(){
                axios.get('api/selection/1')
                .then( response => {
                    this.data1 = ' - ' + response.data.counter + ' Results'
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
                percent1: ''
            }
        }
        
    }
</script>
    
<style  scoped>
    .card{
       font-size: 30px; 
       text-align: center;
    }
    .card-body{
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    
</style>
