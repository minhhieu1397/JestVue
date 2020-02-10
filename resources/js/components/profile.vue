<template>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tour du lịch</h3>
                    <div class="box-tools text-right">
                        <button class="btn btn-success" jest="create-button" data-toggle="modal" data-target="#NewUser">
                            Thêm mới tour
                            <i class="fas fa-plus-circle fa-fw"></i>
                        </button>
                    </div>
                    <div class="box-tools text-right">
                        <button class="btn btn-success" jest="getAll-button">
                            Thêm mới tour
                            <i class="fas fa-plus-circle fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-condensed" >
                    <thead>
                        <tr class="table__title">
                            <th>Tour</th>
                            <th>Phương tiện</th>
                            <th>Ngày khởi hành</th>
                            <th>Thời gian</th>
                            <th>Giá/1 người</th>
                            <th>Ghi chú</th>
                            <th>Chi tiết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody v-for="(tour, index) in list_Tours" :key="tour.id">
                        <tr class="table__content">
                            <td>{{ tour.tour_name }}</td>
                            <td>{{ tour.vehicle }}</td>
                            <td>{{ tour.departure }}</td>
                            <td>{{ tour.day_night }}</td>
                            <td>{{ tour.price }} VNĐ</td>
                            <td>{{ tour.note }}</td>
                            <td> 
                                
                            </td>
                            <td>
                                <ul class="nav nav-treeview">
                                    <a class="nav-link" @click="deleteTour(tour, index)">
                                        <i class="fas fa-trash-alt nav-icon text-red"></i>
                                    </a>
                                    <a class="nav-link" data-toggle="modal" data-target="#UpdateTour">
                                        <i class="fas fa-edit nav-icon text-blue"></i>
                                    </a>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <!-- /.box -->
        </div>
       
        <!-- Modal add new tour -->
        <div class="modal fade" id="NewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="NewTourLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                     
                    <div class="modal-body">
                        <div class="api-calling">
                            <div v-if="success != ''">
                                <div class="alert alert-success"> {{ success }} </div>
                            </div>
                            <div class="create-form">
                                <div class="form-group">
                                    <label>Tour</label>
                                    <input v-model="tour.tour_name" type="text" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phương tiện</label>
                                    <input v-model="tour.vehicle" type="text" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ngày khởi hành</label>
                                    <input v-model="tour.departure" type="date" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Thời gian</label>
                                    <input v-model="tour.day_night" type="text" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input v-model="tour.price" type="text" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <input v-model="tour.note" type="text" name="user_name"
                                    class="form-control">
                                </div>
                                <div class="button-create">
                                    <button @click="createTour" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Tour -->
        <div class="modal fade" id="UpdateTour" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateTourLable">Update Tour</h5>
                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="api-calling">
                            <div v-if="success !== ''" class="alert alert-success"> {{success}}</div>
                            <div class="create-form">
                                <div class="form-group">
                                    <label>Tour</label>
                                    <input v-model="tour.tour_name" type="text" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.tour_name" class="text-danger"> {{ errors.tour_name[0] }} </span>
                                </div>
                                <div class="form-group">
                                    <label>Phương tiện</label>
                                    <input v-model="tour.vehicle" type="text" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.vehicle" class="text-danger"> {{ errors.vehicle[0] }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Ngày khởi hành</label>
                                    <input v-model="tour.departure" type="date" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.departure" class="text-danger"> {{ errors.departure[0] }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Thời gian</label>
                                    <input v-model="tour.day_night" type="text" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.day_night" class="text-danger"> {{ errors.day_night[0] }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input v-model="tour.price" type="text" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.price" class="text-danger"> {{ errors.price[0] }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <input v-model="tour.note" type="text" name="user_name"
                                    class="form-control">
                                    
                                    <span v-if="errors.note" class="text-danger"> {{ errors.note[0] }}</span>
                                </div>
                                <div class="button-create">
                                    <button @click="updateTour(tour)" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tour: {
                    tour_name: '',
                    vehicle: '',
                    departure: '',
                    day_night: '',
                    price: '',
                    note: '',
                },
                errors: [],
                success: '',
                list_Tours: [],
            }
        },
        methods: {
            createTour(tour) {
                axios.post('/api/tour', {tour_name: this.tour.tour_name, vehicle: this.tour.vehicle, departure: this.tour.departure, 
                    day_night: this.tour.day_night, price: this.tour.price, note: this.tour.note })
                    .then(response => {
                        this.tour.tour_name = null
                        this.tour.vehicle = null
                        this.tour.departune = null
                        this.tour.day_night = null
                        this.tour.price = null
                        this.tour.note = null
                        this.success = 'Tạo Tour thành công'
                    })
                    .catch(error => {
                        this.success = ''
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors
                        }
                    })
            },
            getAllTours() {
                axios.get('/api/tour')
                .then(response => {
                   this.list_Tours = response.data
                })
                .catch(error => {
                   this.errors = error.response.data.errors.name
                })
            },
            deleteTour(tour, index) {
                axios.delete('/api/tour/' + tour.id)
                .then(response => {
                    console.log(response.data.result)
                    this.list_Tours.splice(index, 1)
                })
                .catch(error => {
                    this.success = ''
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
				})
            },
            sendTourUpdate(tour) {
                this.tour = tour
            },
            updateTour() {
                axios.put('/api/tour/' + this.tour.id, {tour_name: this.tour.tour_name, vehicle: this.tour.vehicle, departune: this.tour.departune, day_night: this.tour.day_night,
                    price: this.tour.price, note: this.tour.note})
				.then(response => {
                    this.success = 'Cập nhập thành công'
				})
				.catch(error => {
                    this.success = ''
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
				})
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
