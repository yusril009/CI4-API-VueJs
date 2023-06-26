import { createRouter, createWebHistory } from "vue-router";
import BarangList from "../views/BarangList.vue";
import AddBarang from "../views/AddBarang.vue";
import EditBarang from "../views/EditBarang.vue";

const routes = [
  {
    path: "/",
    name: "BarangList",
    component: BarangList,
    meta: {
      title: "WEBSITE BARANG LIST",
    },
  },
  {
    path: "/add",
    name: "AddBarang",
    component: AddBarang,
    meta: {
      title: "WEBSITE BARANG LIST",
    },
  },
  {
    path: "/edit/:id",
    name: "EditBarang",
    component: EditBarang,
    meta: {
      title: "WEBSITE BARANG LIST",
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
