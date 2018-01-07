<template>
    <div id="AdminDashboardMain">
        <tables-app></tables-app>
    </div>
</template>
<style>
    td , th{
        font-size: 13px;
    }
</style>
<script>
    import adminTable from './../partials/adminTables'

    export default {
        components: {
            'tables-app': adminTable,
        }
    }
</script>
