<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dining Chair Shampooing</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    :root {
      --primary-color: #4e73df;
      --secondary-color: #1cc88a;
      --accent-color: #f6c23e;
      --dark-color: #5a5c69;
      --light-color: #f8f9fc;
      --border-radius: 8px;
      --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: var(--light-color);
      color: #444;
      line-height: 1.6;
    }

    .header {
      background: linear-gradient(135deg, var(--primary-color), #3a57c9);
      color: white;
      padding: 20px 0;
      text-align: center;
      box-shadow: var(--box-shadow);
    }

    .header h1 {
      margin: 0;
      font-size: 2.2rem;
      font-weight: 600;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      padding: 30px 20px;
      max-width: 1200px;
      margin: 20px auto;
      gap: 30px;
    }

    .main-content {
      flex: 3;
      min-width: 300px;
      background: white;
      border-radius: var(--border-radius);
      overflow: hidden;
      box-shadow: var(--box-shadow);
      transition: var(--transition);
    }

    .main-content:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      flex: 1;
      min-width: 250px;
      background: white;
      border-radius: var(--border-radius);
      overflow: hidden;
      box-shadow: var(--box-shadow);
      transition: var(--transition);
    }

    .sidebar:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .service-title {
      background: linear-gradient(135deg, var(--primary-color), #3a57c9);
      color: white;
      padding: 20px;
      margin: 0;
      font-size: 1.5rem;
      font-weight: 600;
    }

    .service-image {
      background: linear-gradient(135deg, #36d1dc, #5b86e5);
      height: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .service-image img {
      width: 100%;
      height: auto;
      object-fit: cover;
      transition: var(--transition);
    }

    .service-image:hover img {
      transform: scale(1.05);
    }

    .content-padding {
      padding: 25px;
    }

    .description {
      margin-top: 20px;
      font-size: 16px;
      color: #555;
      line-height: 1.8;
    }

    .description h3 {
      color: var(--primary-color);
      margin-bottom: 15px;
      font-size: 1.5rem;
      font-weight: 600;
      position: relative;
      padding-bottom: 10px;
    }

    .description h3:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--secondary-color);
    }

    .description p {
      margin-bottom: 15px;
    }

    .booking-details {
      padding: 25px;
    }

    .booking-details h3 {
      color: var(--primary-color);
      margin-bottom: 20px;
      font-size: 1.5rem;
      font-weight: 600;
      position: relative;
      padding-bottom: 10px;
    }

    .booking-details h3:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--secondary-color);
    }

    .booking-details table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .booking-details tr {
      border-bottom: 1px solid #eee;
      transition: var(--transition);
    }

    .booking-details tr:hover {
      background-color: #f9f9f9;
    }

    .booking-details td {
      padding: 15px 0;
      font-size: 16px;
    }

    .booking-details td:last-child {
      text-align: right;
      font-weight: 500;
    }

    .booking-details tr:last-child {
      border-top: 2px solid #eee;
      border-bottom: none;
      font-size: 18px;
      color: var(--primary-color);
    }

    .book-now {
      display: block;
      width: 100%;
      margin-top: 20px;
      background: linear-gradient(135deg, var(--primary-color), #3a57c9);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 15px 20px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 4px 6px rgba(78, 115, 223, 0.3);
    }

    .book-now:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 8px rgba(78, 115, 223, 0.4);
      background: linear-gradient(135deg, #3a57c9, var(--primary-color));
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 30px;
    }

    .feature {
      flex: 1;
      min-width: 200px;
      background: #f8f9fc;
      padding: 20px;
      border-radius: var(--border-radius);
      text-align: center;
      transition: var(--transition);
    }

    .feature:hover {
      transform: translateY(-5px);
      box-shadow: var(--box-shadow);
    }

    .feature i {
      font-size: 2rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    .feature h4 {
      margin-bottom: 10px;
      color: var(--dark-color);
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .main-content, .sidebar {
        width: 100%;
      }
    }

    /* Login Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      overflow: auto;
      transition: all 0.3s ease;
    }

    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 30px;
      width: 90%;
      max-width: 500px;
      border-radius: var(--border-radius);
      box-shadow: var(--box-shadow);
      transform: translateY(-20px);
      transition: all 0.3s ease;
      position: relative;
    }

    .modal.show {
      display: block;
    }

    .modal.show .modal-content {
      transform: translateY(0);
    }

    .close-modal {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 24px;
      color: var(--dark-color);
      cursor: pointer;
      transition: var(--transition);
    }

    .close-modal:hover {
      color: var(--primary-color);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark-color);
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      transition: var(--transition);
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
      outline: none;
    }

    .error-message {
      color: #e74a3b;
      font-size: 14px;
      margin-top: 5px;
      display: none;
    }

    .submit-btn {
      background: linear-gradient(135deg, var(--primary-color), #3a57c9);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 12px 25px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 4px 6px rgba(78, 115, 223, 0.3);
      display: block;
      width: 100%;
    }

    .submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 8px rgba(78, 115, 223, 0.4);
      background: linear-gradient(135deg, #3a57c9, var(--primary-color));
    }
</style>
</head>
<body>
<div class="header">
  <h1>Dining Chair Shampooing Service</h1>
</div>

<div class="container">
  <div class="main-content">
    <h2 class="service-title">HOME CLEANING: Dining Chair Shampooing</h2>
    <div class="service-image">
      <img src="https://aonedeepcleaning.in/assets/img/dining-chair-cleaning-service-sm.jpg" alt="Dining Chair Shampooing">
    </div>
    <div class="content-padding">
      <div class="description">
        <h3>Professional Chair Cleaning</h3>
        <p>Our specialized shampooing process for dining chairs removes stains, dirt, and odors, leaving your chairs looking fresh and clean. Our service is ideal for fabric, upholstered, and cushioned dining chairs, restoring their appearance and extending their lifespan.</p>

        <div class="features">
          <div class="feature">
            <i class="fas fa-chair"></i>
            <h4>Stain Removal</h4>
            <p>Effective treatment for all types of stains</p>
          </div>
          <div class="feature">
            <i class="fas fa-spray-can"></i>
            <h4>Deep Shampooing</h4>
            <p>Professional-grade cleaning solutions</p>
          </div>
          <div class="feature">
            <i class="fas fa-wind"></i>
            <h4>Odor Elimination</h4>
            <p>Freshens and deodorizes fabrics</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="booking-details">
      <h3>Booking Details</h3>
      <table>
        <tr><td>Price</td><td>120</td></tr>
        <tr><td>Quantity</td><td>1</td></tr>
        <tr><td>Discount</td><td>0</td></tr>
        <tr><td><strong>Total</strong></td><td><strong>120</strong></td></tr>
      </table>
      <button class="book-now"><i class="fas fa-calendar-check"></i> Book Now</button>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <h2 style="color: var(--primary-color); margin-bottom: 20px; text-align: center;">Customer Login</h2>
    <p style="margin-bottom: 25px; text-align: center;">Please provide your information to book this service</p>

    <form id="loginForm">
      <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" id="customerName" class="form-control" required>
        <div class="error-message" id="nameError">Please enter your name</div>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" class="form-control" required>
        <div class="error-message" id="addressError">Please enter your address</div>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" class="form-control" required>
        <div class="error-message" id="phoneError">Please enter a valid phone number</div>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" required>
        <div class="error-message" id="emailError">Please enter a valid email address</div>
      </div>

      <button type="submit" class="submit-btn">Proceed to Booking</button>
    </form>
  </div>
</div>

<script>
  // Get the modal
  const modal = document.getElementById('loginModal');

  // Get the button that opens the modal
  const bookBtn = document.querySelector('.book-now');

  // Get the <span> element that closes the modal
  const closeBtn = document.querySelector('.close-modal');

  // Get the form and form elements
  const loginForm = document.getElementById('loginForm');
  const customerName = document.getElementById('customerName');
  const address = document.getElementById('address');
  const phone = document.getElementById('phone');
  const email = document.getElementById('email');

  // Error message elements
  const nameError = document.getElementById('nameError');
  const addressError = document.getElementById('addressError');
  const phoneError = document.getElementById('phoneError');
  const emailError = document.getElementById('emailError');

  // When the user clicks the button, open the modal
  bookBtn.addEventListener('click', function() {
    modal.classList.add('show');
  });

  // When the user clicks on <span> (x), close the modal
  closeBtn.addEventListener('click', function() {
    modal.classList.remove('show');
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.classList.remove('show');
    }
  });

  // Form validation
  loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let isValid = true;

    // Validate name
    if (customerName.value.trim() === '') {
      nameError.style.display = 'block';
      isValid = false;
    } else {
      nameError.style.display = 'none';
    }

    // Validate address
    if (address.value.trim() === '') {
      addressError.style.display = 'block';
      isValid = false;
    } else {
      addressError.style.display = 'none';
    }

    // Validate phone
    const phonePattern = /^\d{10,15}$/;
    if (!phonePattern.test(phone.value.replace(/\D/g, ''))) {
      phoneError.style.display = 'block';
      isValid = false;
    } else {
      phoneError.style.display = 'none';
    }

    // Validate email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
      emailError.style.display = 'block';
      isValid = false;
    } else {
      emailError.style.display = 'none';
    }

    // If all validations pass
    if (isValid) {
      alert('Thank you! Your booking has been confirmed.');
      modal.classList.remove('show');
      loginForm.reset();
    }
  });
</script>
</body>
</html>
