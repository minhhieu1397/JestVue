<template>
 <div class="hello">
   <h1>{{ message }} {{ name }}</h1>
 </div>
</template>

<script>
 export default {
   name: 'hello',
   props: {
     name: String
   },
   data () {
     return {
       message: 'Welcome'
     }
   }
 }
</script>