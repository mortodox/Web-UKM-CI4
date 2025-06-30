<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <h1 class="mb-4">Kalender Kegiatan</h1>
  <div id="calendar"></div>
</div>

<!-- FullCalendar CSS & JS: Versi 5.11.3 yang aman -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listWeek'
      },
      events: <?= json_encode(array_map(function($item) {
        return [
          'title' => $item['judul'],
          'start' => $item['tanggal_mulai'],
          'end'   => date('Y-m-d', strtotime($item['tanggal_selesai'] . ' +1 day')), // supaya tampil di hari terakhir
          'url'   => base_url('kegiatan/edit/' . $item['id']),
        ];
      }, $kegiatan)) ?>,
      eventClick: function(info) {
        info.jsEvent.preventDefault(); // biar gak reload
        if (info.event.url) {
          window.location.href = info.event.url;
        }
      },
      eventColor: '#007bff',
      eventTextColor: '#fff',
    });

    calendar.render();
  });
</script>

<style>
  #calendar {
    background: white;
    padding: 20px;
    border-radius: 10px;
  }
</style>

<?= $this->endSection() ?>
