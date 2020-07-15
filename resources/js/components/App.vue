<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h3 class="text-secondary">Mini Bookstore App</h3>
        </div>

        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Login</router-link>
                    <router-link to="/collections" class="nav-item nav-link">Books</router-link>
                </div>
            </div>
        </nav> -->
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>