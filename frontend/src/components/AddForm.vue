<template>
  <div>
    <h1 class="title">Add new Barang</h1>
    <form @submit.prevent="saveBarang">
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
          <button class="button is-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "AddForm",
  data() {
    return {
      id_barang: "",
      nama_barang: "",
    };
  },
  methods: {
    async saveBarang() {
      try {
        await axios.post("barang", {
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
