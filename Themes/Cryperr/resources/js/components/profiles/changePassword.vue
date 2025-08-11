<template>
  <div class="d-flex justify-content-between">
    <div class="d-flex flex-column">
      <div class="fs-5 fw-medium">{{ trans('auth.password') }}</div>
      <p class="fw-light text-span pe-4 pe-sm-0">
        {{ trans('auth.account-pass-descript') }}
      </p>
    </div>
    <button class="btn btn-primary" @click="showModalChange">{{ trans('auth.change-btn') }}</button>
    <b-modal centered no-close-on-backdrop v-model="showModalChangePassword" hide-footer hide-header>
      <div class="d-block">
        <div class="col-12">
          <div class="form-item">
            <label for="password" class="form-label">{{ trans('auth.newpass') }}</label>
            <div class="input-group bg-light input-group-password">
              <input v-model="dataRequest.password" type="password" class="input form-control" />
            </div>
            <div class="invalid-feedback d-lock">{{ trans('auth.error') }}</div>
          </div>
        </div>
        <div class="col-12">
          <div class="form-item">
            <label for="confirmPassword" class="form-label">{{ trans('auth.confirm-password') }}</label>
            <div class="input-group bg-light">
              <input v-model="dataRequest.confirmPassword" type="password" class="input form-control"/>
            </div>
            <div class="invalid-feedback d-lock">Error</div>
          </div>
        </div>
        <div class="col-12">
          <div class="form-item">
            <label for="verifyCode" class="form-label">{{ trans('auth.verify-title') }}</label>
            <VerifyCodeInput v-on:complete="onComplete"></VerifyCodeInput>
          </div>
        </div>
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="fw-light" v-if="showSendCode">
              <b-button class="mt-3" variant="outline-warning" block
                @click="sendVerifyCode()">{{ trans('auth.send') }}</b-button>
            </div>
            <div class="fw-light" v-if="!showSendCode">
              {{ trans('auth.resend') }} {{ timerCount }}s
            </div>
            <div class="fw-medium">{{trans('auth.paste')}}</div>
          </div>
        </div>
        <div class="text-center mt-3">
          <b-button class="mt-3" variant="outline-danger" block @click="closeModalChange()">{{trans('auth.cancel-btn')}}</b-button>
          <b-button class="mt-3" variant="outline-warning" block @click="submitVerifyCode()">{{trans('auth.change-btn')}}</b-button>
        </div>
      </div>
    </b-modal>
  </div>
</template>

<script>
import _ from "lodash";
import Axios from "axios";
import GetPathImg from "../../mixins/GetPathImg";
import VerifyCodeInput from "../VerifyCodeInput.vue";
export default {
  components: {
    VerifyCodeInput,
  },
  mixins: [GetPathImg],
  created() { },
  data() {
    return {
      translations: window.translations,
      dataRequest: {
        code: "",
        password: "",
        confirmPassword: "",
      },
      showModalChangePassword: false,
      showSendCode: true,
      timerCount: 60,
    };
  },
  methods: {
    onComplete(v) {
      console.log("onComplete ", v);
      this.dataRequest.code = v;
    },
    showModalChange() {
      this.showModalChangePassword = true;
    },
    closeModalChange() {
      this.showModalChangePassword = false;
      this.dataRequest = {
        code: "",
        password: "",
        confirmPassword: "",
      };

      this.showSendCode = true;
      this.timerCount = 60;
    },
    sendVerifyCode() {
      Axios.post("/customer/account/send-code-change-password")
        .then((response) => {
          if (response.data.error === false) {
            this.showSendCode = false;
            this.countDownTimer();
            this.$bvToast.toast(response.data.data.message, {
              variant: "success",
              solid: true,
              noCloseButton: true,
            });
          } else {
            this.$bvToast.toast(response.data.message, {
              variant: "danger",
              solid: true,
              noCloseButton: true,
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    submitVerifyCode() {
      Axios.post("/customer/account/request-change-password", this.dataRequest)
        .then((response) => {
          if (response.data.error === false) {
            this.$bvToast.toast(response.data.data.message, {
              variant: "success",
              solid: true,
              noCloseButton: true,
            });
            this.closeModalChange();
          } else {
            this.$bvToast.toast(response.data.message, {
              variant: "danger",
              solid: true,
              noCloseButton: true,
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    countDownTimer() {
      if (this.timerCount > 0) {
        setTimeout(() => {
          this.timerCount -= 1;
          this.countDownTimer();
        }, 1000);
      } else {
        this.showSendCode = true;
      }
    },
  },
};
</script>