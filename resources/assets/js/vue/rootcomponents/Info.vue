<template>

    <div class="content">

        <div v-if="infoview === 'moreInfo'">

            <div class="card-deck">

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('staffManagement')">Staff Management</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            This includes everything right from their attendance to the salary. It also deals with the Teachers evaluation and the learning standards. Priorities to improve the teaching standards etc
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('studentManagement')">Student Management</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-left">
                            It can also manage the Student Data such as Students entire Database, Attendance & Behavior, Parent Portal, Event Management, Subjects and Teachers, Exams and Grades, Report cards and Analytics etc
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('admissionProcess')">Admission Process</a>
                        </h5>
                    </div>               
                    <div class="card-body">
                        <p class="card-text text-left">
                            First and foremost an ERP must have what is required for the complete process of admission. Relevant data of any student of the institute must be easily accessible. Using this feature saves not only time and effort of the institute but also saves huge piles of stationary items that is used during the process of admission.
                        </p>
                    </div>
                </div>

            </div>
        
            <br />

            <div class="card-deck">

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('questionBank')">Question Bank</a>
                        </h5>
                    </div>                
                    <div class="card-body">
                        <p class="card-text text-left">
                            It has the features like Question Banks, Author Questions, Quality check of Question paper, Curriculum mapping, Creating Assessments, manage groups, schedule and administer, Offline access, Mastery tracking and more…    
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('libraryManagement')">Library Management</a>
                        </h5>
                    </div>                
                    <div class="card-body">
                        <p class="card-text text-left">
                            Searches, finds, issues and returns the books properly. This feature also takes a continuous note of the condition of the book. This feature also keeps a track of the student account of the books.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-muted">
                        <h5>
                            <a href="javascript:null" @click="loadComponent('default')">
                                <font-awesome-icon icon="home" pull="left"/>
                            </a>
                            <a href="javascript:null" @click="loadComponent('communication')">Communication</a>
                        </h5>
                    </div>                
                    <div class="card-body">
                        <p class="card-text text-left">
                            In-built ability to be able to notify the users, which includes the staff, students and parents of happenings e.g fees dues, 
                            holiday declaration, exam and the ongoing activities. This serves just like a notice board.
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <div v-if="infoview === 'staffManagement'" class="container">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>                    
                    <h3>Staff Management</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right" title="Back to previous page.">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Just like the students, the staff also has to be managed.
            This includes everything right from their attendance to the salary. 
            It becomes difficult to manage the whole staff for the educational institution and hence, releasing salaries and other expenses becomes easy with the help of HR payroll software.
            It also deals with the Teachers evaluation and the learning standards. Priorities to improve the teaching standards.
        </div>

        <div v-if="infoview === 'studentManagement'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>                    
                    <h3>Student Management</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            It can also manage the Student Data such as Students entire Database, Attendance & Behavior, Parent Portal, Event Management, Subjects and Teachers, Exams and Grades, Report cards and Analytics etc
        </div>

        <div v-if="infoview === 'admissionProcess'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Admission Process</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            First and foremost an ERP must have what is required for the complete process of admission. Relevant data of any student of the institute must be easily accessible. Using this feature saves not only time and effort of the institute but also saves huge piles of stationary items that is used during the process of admission.
        </div>

        <div v-if="infoview === 'questionBank'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>
                    <h3>Question Bank</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            It has the features like Question Banks, Author Questions, Quality check of Question paper, Curriculum mapping, Creating Assessments, manage groups, schedule and administer, Offline access, Mastery tracking and more.
        </div>

        <div v-if="infoview === 'libraryManagement'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>                    
                    <h3>Library Management</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            Searches, finds, issues and returns the books properly. This feature also takes a continuous note of the condition of the book. This feature also keeps a track of the student account of the books.
        </div>

        <div v-if="infoview === 'communication'" class="notify successbox">
            <div class="d-flex bd-highlight">
                <div class="p-2 w-100 bd-highlight">
                    <a href="javascript:null" @click="loadComponent('default')">
                        <font-awesome-icon icon="home" pull="left"/>
                    </a>                    
                    <h3>Communication</h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight" title="Back to previous page.">
                    <a href="javascript:null" @click="loadComponent('moreInfo')">
                        <button type="button" class="btn btn-dark pull-right">
                            <font-awesome-icon icon="hand-point-left" />
                            Back
                        </button>
                    </a>
                </div>
            </div>
            In-built ability to be able to notify the users, which includes the staff, students and parents of happenings e.g fees dues, holiday declaration, exam and the ongoing activities. This serves just like a notice board.
        </div>

    </div>

</template>

<script>
    export default {
        data: function() {
            return {
                infoview: 'moreInfo'
            }
        },
        methods: {
            loadComponent(value) {
                if (value.toLowerCase() === 'default') {
                    //         title: String, 
                    // catchphase: String
                    location.reload();
                }
                this.infoview = value;
            },
        },
    }
</script>

<style scoped>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>