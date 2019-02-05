<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-fixtures', true) ?: []; ?>

<tbi-competitions-leagues-fixtures inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>

        <div v-for="(turn, turn_index) in $root.state.turns" :class="get_bem('turn')"> <?php
            include "_turn-heading.php"; ?>

            <table :class="get_bem('turn__fixtures')"> <?php
                include "_table-heading.php"; ?>
                
                <tbody> <?php
                    include "_fixture.php"; ?>
                </tbody>
            </table>

            <button :class="get_bem('turn__add-fixture')" @click.prevent="add_fixture(turn_index)">Aggiungi una nuova partita</button>
        </div>

        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-leagues-fixtures>