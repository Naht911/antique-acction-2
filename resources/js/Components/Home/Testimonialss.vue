<template>
  <div class="Testimonial-backgroud">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <span class="title_Testimonial">Testimonial</span>
      </div>

      <div class="col-12 d-flex justify-content-center">
        <img src="/img/mt-1804-home-divider1.png" alt="divider1" />
      </div>
    </div>
    <div class="Testimonial">
      <div class="testimonial-content">
        <div class="quote-left">
          <!-- <i class="fas fa-angle-left fa-quote"></i> -->
          <svg
            class="w-6 h-6 text-gray-800 dark:text-white"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 8 14"
            @click="rotateMessageright()"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"
            />
          </svg>
        </div>
        <div class="quote-right">
          <!-- <i class="fas fa-angle-right fa-quote"></i> -->
          <svg
            class="w-6 h-6 text-gray-800 dark:text-white"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 8 14"
            @click="rotateMessageleft()"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"
            />
          </svg>
        </div>
        <div class="content-wrapper">
          <template v-if="TestimonialData.length > 0">
            <p class="content">{{ currentMessage.content }}</p>
          </template>
        </div>
        <div class="person">
          <div class="user-details">
            <template v-if="TestimonialData.length > 0">
              <h4 class="username">{{ currentMessage.name }}</h4>
              <p class="manage">{{ currentMessage.author.name }}</p>
            </template>
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
      currentIndex: 0,
    };
  },
  computed: {
    currentMessage() {
      return this.TestimonialData[this.currentIndex];
    },
  },
  mounted() {
    setInterval(this.rotateMessageleft, 3000);
  },
  methods: {
    rotateMessageleft() {
      this.currentIndex++;
      if (this.currentIndex >= this.TestimonialData.length) {
        this.currentIndex = 0;
      }
    },
    rotateMessageright() {
      this.currentIndex--;
      if (this.currentIndex < 0) {
        this.currentIndex = this.TestimonialData.length - 1;
      }
    },
  },
  props: {
    TestimonialData: {
      type: Object,
      defualt: [],
    }
  },
};
</script>



<style>
.Testimonial-backgroud {
  padding-top: 70px;
  background-image: url(/img/mt-1804-home-parallax2.jpg);
  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
}

.title_Testimonial {
  font-weight: 700;
  font-style: normal;
  font-family: "Libre Baskerville", serif;
  font-size: 55px;
  line-height: 1.4;
  color: white;
}

.Testimonial {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 50vh;
  justify-content: center;
  overflow: hidden;
  padding: 10px;
  color: white;
}

.testimonial-content {
  padding: 40px 80px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center; /* Center the content horizontally */
}

.quote-left {
  position: absolute;
  left: 40px;
  top: 70px;
  font-size: 30px;
}

.quote-right {
  position: absolute;
  right: 40px;
  top: 70px;
  font-size: 30px;
}

.content-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-grow: 1;
}

.content {
  line-height: 28px;
  font-family: Arial, Helvetica, sans-serif;
  width: 850px;
}

.username {
  font-family: Arial, Helvetica, sans-serif;
  width: 400px;
  line-height: 20px;
  font-size: 32px;
  padding-bottom: 20px;
}

.person {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 26px;
}

.person .role {
  font-weight: normal;
  margin: 12px 0;
}

@media (max-width: 768px) {
  .testimonial-content {
    padding: 10px 0;
  }
  .Testimonial {
    height: 40vh;
  }
  .quote-left,
  .quote-right {
    display: none;
  }

  .content {
    line-height: 14px;
    font-family: Arial, Helvetica, sans-serif;
    width: 350px;
  }

  .username {
    width: 300px;
    font-size: 20px;
    padding-bottom: 0px;
  }
}
/* .divider {
  height: 5px;
  width: 100%;
  background-color: #fff;
  transform-origin: left;
  animation: rise 10s linear infinite;
} */

/* @keyframes rise {
  0% {
    transform: scaleX(0);
  }
} */
</style>