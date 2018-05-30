import { Line, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default ({
  extends: Line,
  mixins: [reactiveProp],
  data:() => ({
    gradient: null,
    gradient2: null,
    gradient3: null,
    gradient4: null
  }),
  props: ['chartData', 'options'],
  mounted () {
    console.log(this.chartData);
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
    this.gradient3 = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);
    this.gradient4 = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, 'rgba(255, 0, 0, 1)');
    this.gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.5)');
    this.gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');

    this.gradient2.addColorStop(0, 'rgba(0, 231, 255, 1)');
    this.gradient2.addColorStop(0.5, 'rgba(0, 231, 255, 0.5)');
    this.gradient2.addColorStop(1, 'rgba(0, 231, 255, 0)');

    this.gradient3.addColorStop(0, 'rgba(145,232,66, 1)');
    this.gradient3.addColorStop(0.5, 'rgba(145,232,66, 0.5)');
    this.gradient3.addColorStop(1, 'rgba(145,232,66, 0)');

    this.gradient4.addColorStop(0, 'rgba(162, 111, 252, 1)');
    this.gradient4.addColorStop(0.5, 'rgba(162, 111, 252, 5)');
    this.gradient4.addColorStop(1, 'rgba(162, 111, 252, 0)');


    this.renderChart({
      labels: this.chartData.labels,
      datasets: [
        {
          label: 'Net sales in this period',
          borderColor: 'rgba(255, 0, 0, 1)',
          pointBackgroundColor: 'white',
          borderWidth: 1,
          pointBorderColor: '#eeeeee',
          backgroundColor: this.gradient,
          data: this.chartData.datasets[0].data
        },
        {
          label: 'Charged for shipping',
          borderColor: 'rgba(0, 231, 255, 1)',
          pointBackgroundColor: 'white',
          borderWidth: 1,
          pointBorderColor: '#eeeeee',
          backgroundColor: this.gradient2,
          data: this.chartData.datasets[1].data
        },
        {
          label: 'Gross sales in this period',
          borderColor: 'rgba(145,232,66, 1)',
          pointBackgroundColor: 'white',
          borderWidth: 1,
          pointBorderColor: '#000000',
          backgroundColor: this.gradient3,
          data: this.chartData.datasets[2].data
        },
        {
          label: 'Visitors',
          borderColor: 'rgba(162, 111, 252, 1)',
          pointBackgroundColor: 'white',
          pointBorderColor: '#000000',
          borderWidth: 1,
          backgroundColor: this.gradient4,
          data: this.chartData.datasets[3].data
        }
      ]
    }, {
      tooltips: {
        backgroundColor: '#4F5565',
        titleFontStyle: 'normal',
        titleFontSize: 18,
        bodyFontFamily: "'Proxima Nova', sans-serif",
        cornerRadius: 3,
        bodyFontColor: '#20C4C8',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false
      },
      legend: {
        display: false
      },
      responsive: true, maintainAspectRatio: false})
  }
})