<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <router-link :to="{ name: 'home' }" class="navbar-brand" title="Change to school Logo and get School Name" >
                    <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" />
                </router-link>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'register' }" class="nav-link disabled">Register</router-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
