<script setup >
import { computed, ref, onMounted } from "vue";
import { useMainStore } from "@/stores/main";
import {
  mdiAccountMultiple,
  mdiChartTimelineVariant,
  mdiMonitorCellphone,
  mdiReload,
  mdiChartPie,
} from "@mdi/js";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SectionMain from "@/Components/Section/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/Section/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/Card/CardBox.vue";
import NotificationBar from "@/Components/NotificationBar.vue";

import * as chartConfig from "@/Components/Charts/chart.config.js";

import UsersTable from "@/Components/Admin/Tables/UsersTable.vue";

defineProps({
    status: String,
    users: Object,
})
const chartData = ref(null);

const fillChartData = () => {
  chartData.value = chartConfig.sampleChartData();
};



const mainStore = useMainStore();

const clientBarItems = computed(() => mainStore.clients.slice(0, 4));

const transactionBarItems = computed(() => mainStore.history);
</script>

<template>
  <AdminLayout>
    <SectionMain>

      <SectionTitleLineWithButton main :icon="mdiAccountMultiple" title="Users" />

      <NotificationBar  color="success" :icon="mdiMonitorCellphone">
        <b>Responsive table.</b> Collapses on mobile
      </NotificationBar>

      <CardBox has-table>
        <UsersTable :checkable="true" :users="users"/>
      </CardBox>
    </SectionMain>
  </AdminLayout>
</template>
