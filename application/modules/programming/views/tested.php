<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-8">
              <pre>
                <code class="JavaScript" style="max-height: 500px;">import random
import math

# With lists we can refer to groups of data with 1 name

# Each item in the list corresponds to a number (index)
# just like how people have identification numbers.
# By default the 1st item in a list has the index 0

# [0 : "string"] [1 : 1.234] [2 : 28] [3 : "c"]

# Python lists can grow in size and can contain data
# of any type

randList = ["string", 1.234, 28]

# Create a list with range
oneToTen = list(range(10))

# An awesome thing about lists is that you can use many
# of the same functions with them that you used with strings, i hate to say this but i want you to do something differently

# Combine lists
randList = randList + oneToTen

# Get the 1st item with an index
print(randList[0])

# Get the length
print("List Length :", len(randList))

# Slice a list to get 1st 3 items
first3 = randList[0:3]

# Cycle through the list and print the index
for i in first3:
    print("{} : {}".format(first3.index(i), i))

# You can repeat a list item with *
print(first3[0] * 3)

# You can see if a list contains an item
print("string" in first3)

# You can get the index of a matching item
print("Index of string :", first3.index("string"))

# Find out how many times an item is in the list
print("How many strings :", first3.count("string"))

# You can change a list item
first3[0] = "New String"

for i in first3:
    print("{} : {}".format(first3.index(i), i))

# Append a value to the end of a list
first3.append("Another")

numList = []
for i in range(6):
    numList.append(random.randrange(1,10))
for i in numList:
    print(i)

# ---------- SORT A LIST : BUBBLE SORT ----------
# The Bubble sort is a way to sort a list
# It works this way
# 1. An outer loop decreases in size each time
# 2. The goal is to have the largest number at the end of
#    the list when the outer loop completes 1 cycle
# 3. The inner loop starts comparing indexes at the beginning
#    of the loop
# 4. Check if list[Index] > list[Index + 1]
# 5. If so swap the index values
# 6. When the inner loop completes the largest number is at
#    the end of the list
# 7. Decrement the outer loop by 1

# Create the value that will decrement for the outer loop
# Its value is the last index in the list
i = len(numList) - 1

while i > 1:

    j = 0

    while j < i:

        # Tracks the comparison of index values
        print("\nIs {} > {}".format(numList[j], numList[j + 1]))
        print()

        # If the value on the left is bigger switch values
        if numList[j] > numList[j + 1]:

            print("Switch")

            temp = numList[j]
            numList[j] = numList[j + 1]
            numList[j + 1] = temp

        else:
            print("Don't Switch")

        j += 1

        # Track changes to the list
        for k in numList:
            print(k, end=", ")
        print()

    print("END OF ROUND")

    i -= 1

for k in numList:
    print(k, end=", ")
print()</code>
              </pre>
            </div>
            <div class="col-md-2">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>
      </div>
    </section>
  </div>



