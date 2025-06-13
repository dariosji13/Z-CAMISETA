<?php

return [

    'label' => ':label Import',

    'modal' => [

        'heading' => ':label Import',

        'form' => [

            'file' => [
                'label' => 'Datei',
                'placeholder' => 'CSV Datei hochladen',
                'rules' => [
                    'duplicate_columns' => '{0} Die Datei darf nicht mehr als einen leeren Spaltenkopf enthalten.|{1,*} Die Datei darf keine doppelten Spaltenköpfe enthalten: :columns.',
                ],

            ],

            'columns' => [
                'label' => 'Spalten',
                'placeholder' => 'Spalte auswählen',
            ],

        ],

        'actions' => [

            'download_example' => [
                'label' => 'Lade Beispiel CSV herunter',
            ],

            'import' => [
                'label' => 'Importieren',
            ],

        ],

    ],

    'notifications' => [

        'completed' => [

            'title' => 'Import abgeschlossen',

            'actions' => [

                'download_failed_rows_csv' => [
                    'label' => 'Informationen über die fehlgeschlagene Zeile herunterladen|Informationen über die fehlgeschlagenen Zeilen herunterladen',
                ],

            ],

        ],

        'max_rows' => [
            'title' => 'CSV Datei ist zu groß',
            'body' => 'Nicht mehr als 1 Zeile auf einmal importieren.|Nicht mehr als :count Zeilen auf einmal importieren.',
        ],

        'started' => [
            'title' => 'Import gestartet',
            'body' => 'Der Import wurde gestartet und 1 Zeile wird im Hintergrund verarbeitet.|Der Import wurde gestartet und :count Zeilen werden im Hintergrund verarbeitet.',
        ],

    ],

    'example_csv' => [
        'file_name' => ':importer-example',
    ],

    'failure_csv' => [
        'file_name' => 'import-:import_id-:csv_name-failed-rows',
        'error_header' => 'Fehler',
        'system_error' => 'Systemfehler, bitte Supportanfrage stellen.',
        'column_mapping_required_for_new_record' => 'Die :attribute-Spalte wurde nicht einer Spalte in der Datei zugeordnet, wird jedoch für die Erstellung neuer Datensätze benötigt.',
    ],

];
