<template>
  <div>
    <h1 class="title">Update Barang</h1>
    <form @submit.prevent="updateBarang">
      <div class="field">
        <label class="label">ID Barang</label>
        <div class="control">
          <input type="text" v-model="id_barang" class="input" placeholder="ID Barang" />
        </div>
      </div>
      <div class="field">
        <label class="label">Nama Barang</label>
        <div class="control">
          <input type="text" v-model="nama_barang" class="input" placeholder="Nama Barang" />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "EditForm",
  data() {
    return {
      id_barang: "",
      nama_barang: "",
    };
  },
  created() {
    this.getBarangById();
  },
  methods: {
    async getBarangById() {
      try {
        const response = await axios.get(`barang/${this.$route.params.id}`);
        (this.id_barang = response.data.id_barang), (this.nama_barang = response.data.nama_barang);
      } catch (error) {
        console.log(error);
      }
    },
    async updateBarang() {
      try {
        await axios.put(`barang/${this.$route.params.id}`, {
          id_barang: this.id_barang,
          nama_barang: this.nama_barang,
        });
        (this.id_barang = ""), (this.nama_barang = ""), this.$router.push("/");
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style></style>
