<template>
  <form>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal2"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header py-2">
            <h5
              class="modal-title title-page text-secondary"
              id="exampleModalLabel"
            >
              Modificar Categoria
            </h5>
            <a
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <label for="name" class="form-label">Nombre</label>

            <input
              type="name"
              id="name"
              class="form-control form-control-user mb-3"
              autofocus
              name="name"
              v-model="form.name"
            />

            <label for="name" class="form-label">Descripcion</label>

            <input
              type="name"
              id="name"
              class="form-control form-control-user mb-3"
              autofocus
              name="name"
              v-model="form.description"
            />
          </div>
          <div class="modal-footer">
            <a
              class="btn btn-danger text-white btn-icon-split mb-4"
              data-dismiss="modal"
            >
              <span class="text font-montserrat font-weight-bold"
                >Cancelar</span
              >
            </a>
            <a
              v-on:click.prevent="createPermission()"
              class="btn btn-primary text-white btn-icon-split mb-4"
            >
              <span class="text font-montserrat font-weight-bold"
                >Modificar Categoria</span
              >
            </a>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>
<style>
@import "~vue-multiselect/dist/vue-multiselect.min.css";
</style>

<script>
import axios from "axios";
import Multiselect from "vue-multiselect";

export default {
  name: "RolesUpdate",
  components: {
    Multiselect,
  },

  created() {},
  data() {
    return {
      form: this.getClearFormObject(),
      permissions: [],
    };
  },
  methods: {
    createPermission: function () {
      var url = "/category/" + this.form.id;
      axios
        .put(url, this.form)
        .then((response) => {
          this.errors = [];
          this.getClearFormObject();
          $("#exampleModal2").modal("hide");
          this.$emit("GetCreatedRol");
        })
        .catch((error) => {});
    },
    UpdateGetRol(role) {
      this.form.name = role.attributes.name;
      this.form.description = role.attributes.description;
      this.form.id = role.id;
    },
    getClearFormObject() {
      return {
        id: null,
        name: null,
        description: null,
      };
    },
  },
};
</script>