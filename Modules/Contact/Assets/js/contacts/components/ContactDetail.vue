<template>
    <div class="div">
        <div class="content-header">
            <h1>
                {{ trans(`contacts.title.${contactTitle}`) }}
            </h1>
            <el-breadcrumb seperate="/">
                <el-breadcrumb-item>
                    <a href="/backend">Home</a>
                </el-breadcrumb-item>
                <el-breadcrumb-item :to="{ name: 'admin.contact.contact.index' }">
                    {{ trans("contacts.list resource") }}
                </el-breadcrumb-item>
                <el-breadcrumb-item :to="{ name: 'admin.contact.contact.create'}">
                    {{ trans(`contacts.title.${contactTitle}`) }}
                </el-breadcrumb-item>
            </el-breadcrumb>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <el-form ref="form" :model="contact" label-width="120px" label-position="top"
                    @keydown="form.errors.clear($event.target.name)">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item :label="trans('contacts.form.contactCode')" :class="{ 'el-form-item is-error': form.errors.has('contactCode')}">
                                        <el-input v-model="contact.contactCode" disabled></el-input>
                                        <div 
                                            v-if="form.errors.has('contactCode')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('contactCode')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item
                                        :label="trans('contacts.form.title')"
                                        :class="{ 'el-form-item is-error': form.errors.has('title'),}"
                                    >
                                        <el-input v-model="contact.title" disabled></el-input>
                                        <div 
                                            v-if="form.errors.has('title')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('title')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item
                                        :label="trans('contacts.form.fullname')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('name'),
                                        }"
                                    >
                                        <el-input v-model="contact.name" disabled></el-input>
                                        <div
                                            v-if="form.errors.has('name')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('name')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item
                                        :label="trans('contacts.form.phone')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('phone'),
                                        }"
                                    >
                                        <el-input v-model="contact.phone" disabled></el-input>
                                        <div
                                            v-if="form.errors.has('phone')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('phone')"
                                        ></div>
                                    </el-form-item>
                                </div>
                                <div class="col-md-6">
                                    <el-form-item
                                        :label="trans('contacts.form.email')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('email'),
                                        }"
                                    >
                                        <el-input v-model="contact.email" disabled></el-input>
                                        <div
                                            v-if="form.errors.has('email')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('email')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <el-form-item
                                        :label="trans('contacts.form.message')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('message'),
                                        }"
                                    >
                                        <el-input type="textarea" v-model="contact.message" disabled></el-input>
                                        <div
                                            v-if="form.errors.has('message')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('message')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <el-form-item
                                        :label="trans('contacts.form.reply')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('reply'),
                                        }"
                                    >
                                        <el-input type="textarea" v-model="contact.reply"></el-input>
                                        <div
                                            v-if="form.errors.has('reply')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('reply')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item
                                        :label="trans('contacts.form.status')"
                                        :class="{
                                            'el-form-item is-error': form.errors.has('status'),
                                        }"
                                    >
                                        <el-switch
                                            v-model="contact.status"
                                            active-color="#13ce66"
                                            inactive-color="#ff4949"
                                        ></el-switch>
                                        <div
                                            v-if="form.errors.has('status')"
                                            class="el-form-item__error"
                                            v-text="form.errors.first('status')"
                                        ></div>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item>
                                <el-button
                                    :loading="loading"
                                    type="primary"
                                    @click="onSubmit()"
                                >
                                    {{ trans("core.save") }}
                                </el-button>
                                <el-button @click="onCancel()">
                                    {{ trans("core.button.cancel") }}
                                </el-button>
                            </el-form-item>
                        </div>
                    </div>
                </el-form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Form from "form-backend-validation";
import ShortcutHelper from "../../../../../Core/Assets/js/mixins/ShortcutHelper";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";

export default {
    mixins: [ShortcutHelper],
    props: {
        locales: {
            default: null,
            type: Object,
        },
        contactTitle: {
            default: null,
            type: String,
        },
    },
    data() {
        return {
            meta: {
                current_page: 1,
                per_page: 10,
            },
            order_meta: {
                order_by: "",
                order: "",
            },
            contactId: +this.$route.params.contactId,
            contact: [],
            form: new Form(),
            loading: false,
        };
    },
    async created() {
        this.fetchContact();
    },
    mounted() {},
    destroyed() {
        $(".publicUrl").hide();
    },
    methods: {
        onSubmit() {
            this.form = new Form(this.contact);
            this.loading = true;

            this.form
                .post(this.getRoute())
                .then((response) => {
                    this.loading = false;
                    this.$message({
                        type: "success",
                        message: response.message,
                    });
                })
                .catch((error) => {
                    console.log(error);
                    this.loading = false;
                    this.$notify.error({
                        title: "Error",
                        message: "There are some errors in the form.",
                    });
                });
        },
        onCancel() {
            this.pushRoute({
                name: "admin.contact.contact.index"
            });
        },
        fetchContact() {
            this.loading = true;
            axios
                .get(
                    route("api.contact.contact.find", { contactId: this.$route.params.contactId })
                )
                .then((response) => {
                    this.loading = false;
                    this.contact = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.loading = false;
                    this.$notify.error({
                        title: "Error",
                        message: "There are some errors in the form.",
                    });
                });
        },
        getRoute() {
            if(this.contactId) {
                return route("api.contact.contact.update", {
                    contactId: this.$route.params.contactId,
                });
            }
            return route("api.contact.contact.store");
        },
    },
};
</script>

<style>
.el-input.is-disabled .el-input__inner, textarea[disabled] {
    color: rgb(78, 78, 78) !important;
}
</style>
