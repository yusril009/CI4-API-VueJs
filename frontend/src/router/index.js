import { createRouter, createWebHistory } from "vue-router";
import BarangList from "../views/BarangList.vue";
import AddBarang from "../views/AddBarang.vue";
import EditBarang from "../views/EditBarang.vue";

const routes = [
  {
    path: "/",
    name: "BarangList",
    component: BarangList,
  },
  {
    path: "/add",
    name: "AddBarang",
    component: AddBarang,
  },
  {
    path: "/edit/:id",
    name: "EditBarang",
    component: EditBarang,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
