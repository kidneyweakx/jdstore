# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)

u = User.new
u.email = "admin@test.com"           # 可以改成自己的 email

u.password = "123456"                # 最少要六码

u.password_confirmation = "123456"   # 最少要六码

u.is_admin = true
u.save

#產品自動產生器
Product.create!(title: "Python01", description: "Python初級", price: 200, quantity: 300, image: open("https://www.python.org/static/opengraph-icon-200x200.png"))
Product.create!(title: "Python02", description: "Python中級", price: 300, quantity: 200, image: open("https://www.python.org/static/opengraph-icon-200x200.png"))
Product.create!(title: "Python03", description: "Python高級", price: 400, quantity: 100, image: open("https://www.python.org/static/opengraph-icon-200x200.png"))
Product.create!(title: "Python04", description: "Python出師", price: 1000, quantity: 50, image: open("https://www.python.org/static/opengraph-icon-200x200.png"))
Product.create!(title: "Database01", description: "資料庫初級", price: 200, quantity: 300, image: open("https://www.computerhope.com/jargon/d/database.jpg"))
Product.create!(title: "Database02", description: "資料庫中級", price: 400, quantity: 200, image: open("https://www.computerhope.com/jargon/d/database.jpg"))
Product.create!(title: "Database03", description: "資料庫高級", price: 800, quantity: 50, image: open("https://www.computerhope.com/jargon/d/database.jpg"))
Product.create!(title: "Database04", description: "資料庫大師級", price: 16000, quantity: 10, image: open("https://www.computerhope.com/jargon/d/database.jpg"))
