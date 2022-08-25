<template>
  <v-container>
    <v-layout wrap>
      <!-- ADD TODO -->
      <v-flex xs12 sm12 md12>
        <div
          style="font-size: 50px; color: white; margin-top: 5%; margin-bottom: 3%; text-align: center"
        >ToDoList</div>
      </v-flex>
      <div class="add-item">
        <v-text-field
          label="What you want ToDo?"
          solo
          :items="toDos"
          v-model="newToDo"
          style="margin-right: 10px"
        ></v-text-field>
        <v-select
          solo
          :items="priorities"
          v-model="selectedPriority"
          item-value="selectedPriority"
          label="Select priority"
          class="select-priority"
        ></v-select>
        <v-menu
          ref="menu"
          v-model="menu"
          :close-on-content-click="false"
          :return-value.sync="selectedDate"
          transition="scale-transition"
          offset-y
        >
          <template v-slot:activator="{ on, attrs }">
            <v-text-field
              v-model="selectedDate"
              v-bind="attrs"
              class="date-picker-custom"
              v-on="on"
            ></v-text-field>
          </template>
          <v-date-picker v-model="selectedDate" no-title scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
            <v-btn text color="primary" @click="$refs.menu.save(selectedDate)">OK</v-btn>
          </v-date-picker>
        </v-menu>
        <v-btn dark @click="AddToDo" class="custom-button">Add</v-btn>
      </div>
      <div class="tabs">
        <div
          class="tab-item"
          @click="tab = 'list'"
          :class="tab === 'list' ? 'underlined-text' : ''"
        >List</div>
        <div
          class="tab-item"
          @click="tab = 'calendar'"
          :class="tab === 'calendar' ? 'underlined-text' : ''"
        >Calendar</div>
      </div>
      <div class="tab-content" v-if="tab === 'list'">
        <!-- FILTERS -->
        <v-flex xs12 sm12 md12 row justify-center>
          <v-select
            solo
            :items="filterPriorities"
            v-model="filterPriority"
            item-value="filterPriority"
            label="Select priority"
            class="select-priority"
          ></v-select>
          <v-menu
            ref="menu3"
            v-model="menu3"
            :close-on-content-click="false"
            :return-value.sync="filterDate"
            transition="scale-transition"
            offset-y
            min-width="290px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="filterDate"
                readonly
                v-bind="attrs"
                v-on="on"
                class="date-picker-custom"
              ></v-text-field>
            </template>
            <v-date-picker v-model="filterDate" range no-title scrollable>
              <v-spacer></v-spacer>
              <v-btn text color="primary" @click="menu3 = false">Cancel</v-btn>
              <v-btn text color="primary" @click="$refs.menu3.save(filterDate)">OK</v-btn>
            </v-date-picker>
          </v-menu>
          <v-btn dark class="custom-button" @click="reset">Reset</v-btn>
        </v-flex>
        <!-- LIST TODO -->
        <div class="todo-list">
          <v-expansion-panels>
            <v-expansion-panel v-if="filteredItems('overdue').length > 0">
              <v-expansion-panel-header>Overdue</v-expansion-panel-header>
              <v-expansion-panel-content>
                <div
                  v-for="(item, index) in filteredItems('overdue')"
                  :key="index"
                  style="margin-bottom: 20px;"
                >
                  <div class="todo-details">
                    <v-icon
                      class="todo-priority-icon"
                      :color="getColorForStatus(item.Priority)"
                    >mdi-checkbox-blank-circle</v-icon>

                    <div>{{ item.Text }}</div>

                    <div class="todo-due-date">- {{item.Date}}</div>

                    <v-spacer></v-spacer>
                    <div class="todo-actions">
                      <v-icon
                        class="todo-status-icon"
                        @click="doneToDo(index)"
                        color="green"
                        v-if="item.Status !== 'Done'"
                      >mdi-check</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="editToDo(index)"
                        color="orange"
                        v-if="item.Status !== 'Done'"
                      >mdi-pencil</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="deleteToDo(index)"
                        color="red"
                      >mdi-delete</v-icon>
                    </div>
                  </div>
                  <v-divider></v-divider>
                </div>
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel v-if="filteredItems('todo').length > 0">
              <v-expansion-panel-header>To do</v-expansion-panel-header>
              <v-expansion-panel-content>
                <div
                  v-for="(item, index) in filteredItems('todo')"
                  :key="index"
                  style="margin-bottom: 20px;"
                >
                  <div class="todo-details">
                    <v-icon
                      class="todo-priority-icon"
                      :color="getColorForStatus(item.Priority)"
                    >mdi-checkbox-blank-circle</v-icon>

                    <div>{{ item.Text }}</div>

                    <div class="todo-due-date">- {{item.Date}}</div>

                    <v-spacer></v-spacer>
                    <div class="todo-actions">
                      <v-icon
                        class="todo-status-icon"
                        @click="doneToDo(index)"
                        color="green"
                        v-if="item.Status !== 'Done'"
                      >mdi-check</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="editToDo(index)"
                        color="orange"
                        v-if="item.Status !== 'Done'"
                      >mdi-pencil</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="deleteToDo(index)"
                        color="red"
                      >mdi-delete</v-icon>
                    </div>
                  </div>
                  <v-divider></v-divider>
                </div>
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel v-if="filteredItems('done').length > 0">
              <v-expansion-panel-header>Done items</v-expansion-panel-header>
              <v-expansion-panel-content>
                <div
                  v-for="(item, index) in filteredItems('done')"
                  :key="index"
                  style="margin-bottom: 20px;"
                >
                  <div class="todo-details">
                    <v-icon
                      class="todo-priority-icon"
                      :color="getColorForStatus(item.Priority)"
                    >mdi-checkbox-blank-circle</v-icon>

                    <div>{{ item.Text }}</div>

                    <div class="todo-due-date">- {{item.Date}}</div>

                    <v-spacer></v-spacer>
                    <div class="todo-actions">
                      <v-icon
                        class="todo-status-icon"
                        @click="doneToDo(index)"
                        color="green"
                        v-if="item.Status !== 'Done'"
                      >mdi-check</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="editToDo(index)"
                        color="orange"
                        v-if="item.Status !== 'Done'"
                      >mdi-pencil</v-icon>
                      <v-icon
                        class="todo-status-icon"
                        @click="deleteToDo(index)"
                        color="red"
                      >mdi-delete</v-icon>
                    </div>
                  </div>
                  <v-divider></v-divider>
                </div>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
        </div>
      </div>
      <div class="tab-content" v-if="tab === 'calendar'">
        <v-sheet height="64">
          <v-toolbar flat color="white">
            <v-btn fab text small color="grey darken-2" @click="$refs.calendar.prev()">
              <v-icon small>mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn outlined class="mr-4" color="grey darken-2" @click="setToday">Today</v-btn>

            <v-toolbar-title v-if="$refs.calendar">{{ $refs.calendar.title }}</v-toolbar-title>
            <v-btn fab text small color="grey darken-2" @click="$refs.calendar.next()">
              <v-icon small>mdi-chevron-right</v-icon>
            </v-btn>
            <v-spacer></v-spacer>
          </v-toolbar>
        </v-sheet>

        <v-sheet height="600">
          <v-calendar
            ref="calendar"
            v-model="focus"
            :weekdays="weekday"
            type="month"
            :events="events"
            event-overlap-mode="column"
            :event-overlap-threshold="30"
            :event-color="getEventColor"
            @change="getEvents"
          ></v-calendar>
        </v-sheet>
      </div>
    </v-layout>

    <!-- EDIT TODO DIALOG -->
    <v-dialog v-model="edit" width="500px">
      <v-card>
        <v-card-title>Edit ToDo</v-card-title>
        <v-card-text class="dialog-content">
          <v-text-field solo v-model="selectedItem.Text" class="full-width"></v-text-field>
          <v-select
            solo
            :items="priorities"
            v-model="selectedItem.Priority"
            item-value="selectedItem.Priority"
            label="Select priority"
            class="select-priority full-width"
          ></v-select>

          <v-menu
            ref="menu2"
            v-model="menu2"
            :close-on-content-click="false"
            :return-value.sync="selectedItem.Date"
            transition="scale-transition"
            offset-y
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="selectedItem.Date"
                v-bind="attrs"
                class="date-picker-custom"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="selectedItem.Date" no-title scrollable>
              <v-spacer></v-spacer>
              <v-btn text color="primary" @click="menu2 = false">Cancel</v-btn>
              <v-btn text color="primary" @click="$refs.menu2.save(selectedItem.Date)">OK</v-btn>
            </v-date-picker>
          </v-menu>
        </v-card-text>
        <v-card-actions>
          <v-btn class="custom-button" @click="edit = false">Cancel</v-btn>
          <v-spacer></v-spacer>
          <v-btn class="custom-button" @click="saveToDo">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import * as moment from "moment";
import Swal from "sweetalert2";
export default {
  name: "HelloWorld",
  data() {
    return {
      toDos: [],
      events: [],
      newToDo: "",
      weekday: [0, 1, 2, 3, 4, 5, 6],
      selectedDate: new Date().toISOString().substr(0, 10),
      tab: "list",
      value: "",
      selectedItem: {},
      menu: false,
      menu2: false,
      menu3: false,
      edit: false,
      toEditIndex: null,
      filterPriority: "All",
      filterPriorities: ["All", "High", "Medium", "Low"],
      priorities: ["High", "Medium", "Low"],
      selectedPriority: "Low",
      all: true,
      high: false,
      medium: false,
      low: false,
      filterDate: ["2000-01-01", "2050-01-01"],
      focus: "",
    };
  },
  methods: {
    filteredItems(type) {
      return this.toDos
        .filter(todo => {
          if (this.filterPriority.toLowerCase() === "all") {
            return true;
          } else {
            return (
              todo.Priority.toLowerCase() === this.filterPriority.toLowerCase()
            );
          }
        })
        .filter(todoItem =>
          moment(todoItem.Date).isBetween(
            this.filterDate[0],
            this.filterDate[1]
          )
        )
        .filter(todoItemResult => {
          switch (type) {
            case "overdue":
              return (
                moment(todoItemResult.Date).isSameOrBefore(moment()) &&
                todoItemResult.Status.toLowerCase() !== "done"
              );
            case "todo":
              return todoItemResult.Status.toLowerCase() === "incomplete";
            case "done":
              return todoItemResult.Status.toLowerCase() === "done";
          }
        });
    },
    reset() {
      this.filterDate = ["2000-01-01", "2050-01-01"];
      this.filterPriority = "All";
    },
    getEventColor(event) {
      return event.color;
    },
    getEvents() {
      const events = [];
      this.toDos.forEach(item => {
        events.push({
          name: item.Text,
          start: item.Date,
          color: this.getColorForStatus(item.Priority),
          timed: false
        });
      });
      this.events = events;
    },
    getColorForStatus(priority) {
      return priority === "High"
        ? "red"
        : priority === "Medium"
        ? "yellow"
        : "green";
    },
    AddToDo() {
      this.toDos.push({
        Text: this.newToDo,
        Status: "incomplete",
        Priority: this.selectedPriority,
        Date: this.selectedDate
      });
      this.newToDo = "";
      this.getEvents();
    },
    doneToDo(value) {
      this.toDos[value].Status = "Done";
    },
    editToDo(value) {
      this.edit = true;
      this.toEditIndex = value;
      this.selectedItem = {
        Text: this.toDos[value].Text,
        Status: this.toDos[value].Status,
        Priority: this.toDos[value].Priority,
        Date: this.toDos[value].Date
      };
    },
    saveToDo() {
      this.toDos[this.toEditIndex] = this.selectedItem;
      localStorage.setItem("toDos", JSON.stringify(this.toDos));
      this.edit = false;

    },
    deleteToDo(value) {
      Swal.fire({
        text: "Are you sure you want to delete this ToDo?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(237 124 72)",
        confirmButtonText: "Yes"
      }).then(result => {
        if (result.value) {
          this.toDos.splice(value, 1);
          localStorage.setItem("toDos", JSON.stringify(this.toDos));
          Swal.fire({
            text: "Your ToDo was deleted successfully!",
            icon: "success",
            confirmButtonColor: "rgb(237 124 72)"
          });
        }
      });
    },
    checkAll() {
      if (this.all === true) {
        this.high = false;
        this.medium = false;
        this.low = false;
      }
    },
    check() {
      if (this.high === true || this.medium === true || this.low === true) {
        this.all = false;
      }
    },
    setToday() {
      this.focus = "";
    }
  },
  mounted() {
    if (localStorage.getItem("toDos"))
      this.toDos = JSON.parse(localStorage.getItem("toDos"));
  },
  watch: {
    toDos: {
      handler() {
        console.log("Todos changed!");
        localStorage.setItem("toDos", JSON.stringify(this.toDos));
      },
      deep: true
    }
  }
};
</script>

<style>
.v-divider {
  border-top: 1px solid rgba(255, 255, 255, 0.3) !important;
}
.v-expansion-panel-header {
  color: rgb(237 124 72) !important;
  font-weight: bold;
  font-size: x-large;
}
.v-expansion-panel::before {
  box-shadow: 0px 3px 1px -2px rgb(237 124 72), 0px 2px 2px 0px rgb(237 124 72),
    0px 1px 5px 0px rgb(237 124 72) !important;
}
.v-expansion-panel-header__icon .v-icon {
  color: rgb(237 124 72) !important;
}
.v-expansion-panels .v-expansion-panel {
  background-color: #ffffff40 !important;
  color: white !important;
}
.dialog-content {
  display: flex;
  width: 100%;
  flex-flow: column;
  align-items: center;
}
.dialog-content > .select-priority {
  max-width: unset;
}
.todo-actions {
  display: flex;
}
.tab-content {
  display: flex;
  flex-flow: column;
  width: 100%;
}
.tabs {
  display: flex;
  width: 100%;
  flex-flow: row;
  justify-content: center;
}
.underlined-text {
  text-decoration: underline;
}
.v-menu__content {
  min-width: auto !important;
}
.full-width {
  width: 100%;
}
.tab-item {
  margin: 0px 10px;
  color: white;
  font-weight: bold;
  font-size: x-large;
  text-transform: lowercase;
}
.todo-list {
  display: flex;
  flex-flow: column;
  width: 100%;
  color: white;
}
.todo-details {
  display: flex;
  align-items: center;
}
.todo-priority-icon {
  padding-right: 10px;
  font-size: smaller !important;
}
.todo-status-icon {
  padding-left: 10px;
}
.todo-due-date {
  font-size: smaller;
  padding-left: 5px;
  opacity: 0.6;
  display: flex;
  flex-flow: row;
  min-width: fit-content;
}
.todo-details {
  padding-bottom: 10px;
}
.v-input__slot {
  width: auto;
}
.v-text-field > .v-input__control > .v-input__slot > .v-text-field__slot {
  background-color: white !important;
  border-radius: 3px;
  padding-bottom: 8px;
  padding-top: 8px;
  padding-left: 10px !important;
}
.date-picker-custom {
  margin-top: unset !important;
  padding-top: unset !important;
  margin-left: 10px;
}
.layout {
  width: 100%;
}
.add-item {
  width: 100%;
  display: flex;
  flex-flow: row;
}
.select-priority {
  max-width: 15%;
}
.row {
  margin-left: unset !important;
}
.custom-button {
  float: right;
  height: 48px !important;
  width: 68px;
  font-size: larger;
  font-weight: bold;
  text-transform: capitalize;
  margin-left: 10px;
  color: white !important;
  background-color: rgb(237 124 72) !important;
}
.swal2-popup .swal2-styled:focus {
  box-shadow: none !important;
}
</style>