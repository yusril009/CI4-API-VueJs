<template>
  <div>
    <h1 class="title">List Barang</h1>
    <router-link :to="{ name: 'AddBarang' }" class="button">Add New</router-link>
    <table class="table is-striped is-fullwidth">
      <thead>
        <tr>
          <th>ID Barang</th>
          <th>Nama Barang</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="barang in barang" :key="barang.id">
          <td>{{ barang.id_barang }}</td>
          <td>{{ barang.nama_barang }}</td>
          <td>
            <router-link :to="{ name: 'EditBarang', params: { id: barang.id } }" class="button is-info is-small">Edit</router-link>
            <button class="button is-danger is-small" @click="deleteBarang(barang.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Barang",
  data() {
    return {
      barang: [],
    };
  },
  created() {
    this.getBarang();
  },
  methods: {
    async getBarang() {
      try {
        const response = await axios.get("barang");
        this.barang = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteBarang(id) {
      try {
        await axios.delete(`barang/${id}`);
        this.getBarang();
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style></style>
