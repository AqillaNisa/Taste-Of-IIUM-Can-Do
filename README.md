# Taste of IIUM

# Taste of IIUM - Food Menu

## Group Information

**Group Name**: Can-Do
**Section**: 1

**Group Members** :
- HANNA BATRISYIA BINTI MOHD SHAHRIR - 2315666
- SITI HUMAIRAH BINTI MOHAMAD SAUFE - 2413580
- WAN NURATHILAH BINTI KHAIRUL NIZAAM - 2414196
- NURUL NISA AQILLA BINTI MOHD NAJIB - 2418644
- MA RUI - 2418802


## Project Overview (THILAH)

Introduction :
Taste-of-IIUM is a web-based application development to help users easily find food and beverages that are available in different Mahallah cafes in IIUM campus. It also included an integrated map feature that showed the exact location of each Mahallah cafe to help users easily reach the cafe without confusion, especially for new students or visitors.

## Project Objectives (HANNA)

- Primary Goal: Create a functional food ordering platform that connects customers and restaurants
- Technical Goal: Implement Laravel MVC architecture with full CRUD operations
- User Experience Goal: Provide an intuitive, responsive interface for both customers and restaurant owners
- Business Goal: Enable efficient order management and tracking system

## Target Users (MARUI)

- Customers: Individuals looking to order food online
- Restaurant Owners: Business owners who want to manage their restaurant digitally
- Administrators: System managers who oversee the platform


## Features and Functionalities (SITI)

**Customer Features**

- Navigation Bar: Navigate users to different sections of the website smoothly
- Mahallah Map: Displays Mahallah location to guide newcomers around IIUM
- Contact Section: Submit suggestions through email and stall operators can contact admin about their stall
- Browse Mahallah : View list of Mahallah in IIUM
- View Stall: View stall available in the Mahallah, include stall name, image of their food and operating hours
- Search bar for food stall: To find specific food stall easily
- View stall menu: The "See More Details" button display the stalls menu
  

**Admin Features** 

- Admin Dashboard: Displays the number of stalls, food item and admin registered and the recent stalls updated.
- Stalls Management: Add, edit, delete stall with images
- Food Items Management: Add, edit, delete food item

## Technical Implementation 

**Technology Stack**

- Backend Framework: Laravel 10.x
- Frontend: Blade Templates with Bootstrap 5
- Database: MySQL 8.0
- Authentication: Laravel Breeze
- Image Storage: Laravel File Storage
- Development Environment: XAMPP

**Database Design**

Database Schema Overview
This database consists of 11 main tables used to interact between customers, 
stalls and menu items. 

Core Tables:
 
- users - Manage the login process and administrator access rights
- stalls - Store information about food stalls, mahallahs, operating hours and food menu lists.
- foods - Store information for each menu, category, price, and specific stall via stall_id. 
- migrations - Record information related to the database and record changes or table creation

### Entity Relationship Diagram (ERD) (HANNA)

https://docs.google.com/document/d/1syCtG3ThItfpYG8DGrM53BR0919dyozAFXBvrtixH2k/edit?usp=sharing 

Key Relationships:

- Users can have multiple Orders (One-to-Many)
- Restaurants can have multiple Menu Items (One-to-Many)
- Orders can have multiple Order Items (One-to-Many)
- Menu Items belong to Categories (Many-to-One)

** Laravel Components Implementation**

- Routes (Web.php)
  
php
`// Authentication Routes`
Route::redirect('/login', '/admin/login');

Route::prefix('admin')->group(function () {
    // Guest only routes (Login page & authentication processing)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'create'])->name('login');
        Route::post('/login', [AuthController::class, 'store'])->name('admin.login.store');
    });
    
`// Authenticated admin routes (Logout processing)`
Route::middleware(['auth', 'admin'])->group(function () {
Route::post('/logout', [AuthController::class, 'destroy'])->name('admin.logout');
    });
});

`// Public Routes`
Route::get('/mahallah/{mahallah}', [StallPageController::class, 'show']);
Route::get('/stall', function (){return view('stall');});
Route::get('/stall/{mahallah}',function($mahallah){return view('stall', compact('mahallah'));})->name('stall');


`// stall Protected Routes`
oute::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('users', UserController::class)->except(['show'])->names('admin.users');
        Route::resource('stalls', StallController::class)->except(['show'])->names('admin.stalls');
        Route::resource('foods', FoodController::class)->except(['show'])->names('admin.foods');
    });
});

- Controllers
  
  *Main Controllers Implemented are below :*

1. AuthController: Handles user login display, admin authentication processing, and logout functionality.
2. DashboardController: Manages the admin dashboard view and main backend analytics.
3. UserController: Handles CRUD operations and management for system users.
4. StallController: Manages backend administration, creation, and updating of stalls.
5. FoodController: Handles backend CRUD operations for food items and menus.
6. StallPageController: Manages public-facing views for specific stalls and Mahallah listings.

- Models and Relationships
  
php// User Model
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'is_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }
}

// Stall Model  
class Stall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mahallah',
        'opening_hours',
        'food_type',
        'menu_items',
        'image_path',
    ];

    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}

// Food Model
class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'stall_id',
        'name',
        'category',
        'price',
        'description',
        'image_path',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function stall(): BelongsTo
    {
        return $this->belongsTo(Stall::class);
    }
}

- Views and User Interface

  *Blade Templates Structure:*
  -layouts/app.blade.php: The main layout used for all public-facing pages.
  -admin/layouts/app.blade.php: The master layout specifically for the admin dashboard pages.
  -welcome.blade.php: The initial landing page of the website.
  -home.blade.php: The main homepage for logged-in or browsing users.
  -login.blade.php: The page containing the login form for users and admins.
  -stall.blade.php: The public page that displays information and menus for a specific stall.
  -mahallah/male.blade.php: A list of food stalls located in the male Mahallah.
  -mahallah/female.blade.php: A list of food stalls located in the female Mahallah.
  -admin/dashboard.blade.php: The central overview page for system administrators.
  
   *Design Features:*
   - Responsive Design: Implements Bootstrap 5 for a mobile-first approach, allowing students and staff to seamlessly browse food options.
   - Color Scheme: Modern orange and white and blue theme representing food industry.
   - Navigation: Features an intuitive Mahallah-based and gender-segregated layout (Male vs. Female      Mahallah selections) along with distinct navigation views depending on whether the user is a        public visitor or a system administrator.
   - Interactive Elements: Features dynamic data tables, modular UI forms, and shared validation         error feedback to make stall registration and menu management quick and seamless for administrators.


## User Authentication System

### **Authentication Features**
- **Registration System**: Email validation, password confirmation
- **Login System**: Secure authentication with "Remember Me" option
- **Password Reset**: Email-based password recovery system
- **Role-Based Access**: Different dashboards for visitors and admin
- **Profile Management**: Users can update information regarding stall and food items

### **Security Measures**
- Password encryption using Laravel's built-in hashing
- CSRF protection on all forms
- Input validation and sanitization
- Middleware protection for authenticated routes


## Installation and Setup Instructions 
### Prerequisites :
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 8.0
- XAMPP 

### Step-by-Step Installation

**1. Clone the Repository**
    
    bash
    git clone https://github.com/[your-username]/QuickPlate.git/n
    cd QuickPlate

**2. Install Dependencies**

    bash
    composer install
    npm install

**3. Environment Configuration**

    bash
    cp .env.example .env
    php artisan key:generate

**4. Database Setup**
    
    bash
    php artisan migrate
    php artisan db:seed

**5. Start Development Server**
   
    bash
    php artisan serve
    npm run dev

## Testing and Quality Assurance

###  Functionality Testing

 - Navigation and routing
 - Mahallah and stall browsing
 - Stall menu display
 - Admin stall and food item management(CRUD)
 - Admin user and authentication management
 - Responsive design across devices

### Browser Compatibility

-  Google Chrome (Latest)
-  Mozilla Firefox (Latest)
-  Safari (Latest)
-  Microsoft Edge (Latest)

### Performance Testing

- Page load times under 3 seconds
- Database queries optimized
- Responsive design tested on multiple screen sizes


## Challenges Faced and Solutions
### Challenge 1: Managing Food Information Across Multiple Mahallah Cafes
- Problem: Each Mahallah Cafe offers different food and beverage options
- Solution: Design a structured relational database to organize and display the information efficiently
### Challenge 2: Integrating Location Information
- Problem: New students and visitors are not aware of the location of Mahallah Cafes and the types of food available at each Mahallah.
- Solution: Provide a map image for Mahallah locations to help users find the location and list of food menus offered.
### Challenge 3: Maintaining Accurate and Consistent Menu Data
- Problem: Food and Beverage information must remain consistent across all pages and updates.
- Solution: Centralized menu management through the database, administrators can easily update menu information in one database.

## Future Enhancements
### Phase 2 Features (Potential Improvements)
- **Real-time Notifications**: Push notifications for order updates
- **Payment Integration**: Stripe or PayPal payment processing
- **GPS Tracking** : Real-time delivery tracking with maps
- **Rating System** : Customer reviews and restaurant ratings
- **Advanced Analytics** : Detailed sales reports and customer insights
- **Mobile App** : Native mobile application for iOS and Android

### Scalability Considerations

- Database optimization for larger datasets
- Caching implementation for improved performance
- API development for mobile app integration
- Load balancing for high traffic scenarios


## Learning Outcomes
### Technical Skills Gained

- Laravel Framework: Understanding of MVC architecture and Eloquent ORM
- Database Design: Creating efficient database schemas and relationships
- Authentication: Implementing secure user authentication systems
- Frontend Development: Building responsive interfaces with Bootstrap
- Version Control: Using Git and GitHub for project management

### Soft Skills Developed

- **Team Collaboration** : Working effectively in a group environment
- **Project Management** : Planning and executing a complex web application
- **Problem Solving** : Debugging and resolving technical challenges
- **Documentation** : Creating comprehensive project documentation


## References

1. Laravel Documentation. (2024). Laravel 10.x Documentation. Retrieved from https://laravel.com/docs/10.x
2. Bootstrap Documentation. (2024). Bootstrap 5.3 Documentation. Retrieved from https://getbootstrap.com/docs/5.3/
3. MySQL Documentation. (2024). MySQL 8.0 Reference Manual. Retrieved from https://dev.mysql.com/doc/refman/8.0/en/
4. MDN Web Docs. (2024). Web Development Resources. Retrieved from https://developer.mozilla.org/
5. Stack Overflow. (2024). Programming Q&A Platform. Retrieved from https://stackoverflow.com/


## Conclusion
Taste-of-IIUM demonstrates the development of a web-based application using the Laravel framework. It applies key concepts such as MVC architecture, database management, and user interface design. The system improves access to food information in IIUM mahallah Cafes and enhances navigation through an integrated map feature. 

### Key Achievements

- Successfully implemented all required Laravel components (Routes, Controllers, Views, Models)
- Created a functional food ordering system with user role management
- Developed a responsive, user-friendly interface
- Demonstrated understanding of database relationships and CRUD operations
- Applied security best practices for user authentication

### Project Impact
This project provides practical experience in building real-world web applications and demonstrates the ability to work collaboratively in a team environment. The skills gained through this project are directly applicable to professional web development scenarios.

- Project Completion Date: 11/6/2025
- Course: INFO 3305 Web Application Development


