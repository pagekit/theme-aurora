<template>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>
            <h2 class="uk-margin-remove">{{ 'Theme' | trans }}</h2>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
        </div>
    </div>

    <div class="uk-form uk-form-horizontal">

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Style' | trans }}</span>
            <div class="uk-form-controls">
                <select id="form-styles" class="uk-form-width-large" v-model="config.style">
                    <option value="">{{ 'Default' | trans }}</option>
                    <option value="green">{{ 'Urban Green' | trans }}</option>
                    <option value="turquoise">{{ 'Dark Turquoise' | trans }}</option>
                    <option value="red">{{ 'Gradient Red' | trans }}</option>
                    <option value="yellow">{{ 'Midnight Yellow' | trans }}</option>
                    <option value="blue">{{ 'Flat Blue' | trans }}</option>
                </select>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Logo Small' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input-image :source.sync="config.logo_small"></input-image>
                <p class="uk-form-help-block">{{ 'Select an optional logo on small devices.' | trans }}</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Logo Off-canvas' | trans }}</label>
            <div class="uk-form-controls uk-form-width-large">
                <input-image :source.sync="config.logo_offcanvas"></input-image>
                <p class="uk-form-help-block">{{ 'Select an optional logo for the off-canvas menu.' | trans }}</p>
            </div>
        </div>

        <div class="uk-form-row">
            <label class="uk-form-label">Sidebar {{ 'Position' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                   <select id="form-hero-style" class="uk-form-width-large" v-model="config.sidebar_width">
                       <option value="15">{{ '15%' | trans }}</option>
                       <option value="20">{{ '20%' | trans }}</option>
                       <option value="25">{{ '25%' | trans }}</option>
                       <option value="30">{{ '30%' | trans }}</option>
                       <option value="33">{{ '33%' | trans }}</option>
                       <option value="40">{{ '40%' | trans }}</option>
                       <option value="50">{{ '50%' | trans }}</option>
                   </select>
               </p>
               <p class="uk-form-help-block">{{ 'Select the sidebar width.' | trans }}</p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="config.sidebar_parallax"> {{ 'Enable parallax effect' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed uk-margin-bottom">
                    <label><input type="checkbox" v-model="config.sidebar_fixed"> {{ 'Fixed background position' | trans }}</label>
                </p>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'Section Divider' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="config.section_divider"> {{ 'Displays a divider between the layout sections.' | trans }}</label>
            </div>
        </div>

        <div class="uk-form-row">
            <span class="uk-form-label">{{ 'To-top Scroller' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <label><input type="checkbox" v-model="config.totop_scroller"> {{ 'Enable a to-top scroller.' | trans }}</label>
            </div>
        </div>

    </div>

</template>

<script>

    module.exports = {

        section: {
            label: 'Theme',
            icon: 'pk-icon-large-brush',
            priority: 15
        },

        data: function () {
            return _.extend({config: {}}, window.$theme);
        },

        events: {

            save: function() {

                this.$http.post('admin/system/settings/config', {name: this.name, config: this.config}).catch(function (res) {
                    this.$notify(res.data, 'danger');
                });

            }

        }

    };

    window.Site.components['site-theme'] = module.exports;

</script>
