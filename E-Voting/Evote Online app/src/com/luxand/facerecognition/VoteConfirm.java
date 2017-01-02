package com.luxand.facerecognition;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * 
 */
public class VoteConfirm extends Activity {

    private TextView confirm;
    private ImageView image;
    private Button ok;
    private String election_id, user_id, candidate_name;

    @Override
    public void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.vote_confirm);
        image = (ImageView)findViewById(R.id.imageView1);
        image.setVisibility(View.GONE);
        ok = (Button)findViewById(R.id.ok);
        ok.setVisibility(View.GONE);
        ok.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent intent2 = new Intent(getApplicationContext(), Election_List.class);
		        intent2.putExtra("user_id", user_id);
		        startActivity(intent2);
		        finish();
				
			}
		});
        election_id  = getIntent().getStringExtra("election_id");
        user_id  = getIntent().getStringExtra("user_id");
        candidate_name  = getIntent().getStringExtra("candidate_name");
        System.out.println("Candidate for "+election_id);
       
        confirm = (TextView)findViewById(R.id.confirm);
        
        new is_voted().execute(user_id, election_id, candidate_name);
        
    }

    @Override
    public void onBackPressed()
    {
        Intent intent2 = new Intent(getApplicationContext(), Election_List.class);
        intent2.putExtra("user_id", user_id);
        startActivity(intent2);
        finish();
    }
    public class is_voted extends AsyncTask<String,String,String> {

        String function = "voting";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {
        	confirm.setText("Registering your Vote. Please Wait...");

        }

        protected String doInBackground(String ... param)
        {
            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();

                namevaluepair.add(new BasicNameValuePair("voter_id", param[0]));
                namevaluepair.add(new BasicNameValuePair("election_id",param[1]));
                namevaluepair.add(new BasicNameValuePair("candidate_name",param[2]));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;
        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if(success.equals("true")){
                	image.setVisibility(View.VISIBLE);
                	ok.setVisibility(View.VISIBLE);
                	confirm.setText("Your Vote has been registered successfully!!!!");
                    //Toast.makeText(getApplicationContext(), "Your Vote has been registered successfully", Toast.LENGTH_LONG).show();
                    /*Intent intent2 = new Intent(getApplicationContext(), Election_List.class);
                    intent2.putExtra("user_id",user_id);
                    intent2.putExtra("is_voted", true);
                    finish();
                    startActivity(intent2);*/
                    }
                else if(success.equals("false")){
                	ok.setVisibility(View.VISIBLE);
                	confirm.setText("You have already voted for this election!");
                    /*Toast.makeText(getApplicationContext(), "You have already voted for this election", Toast.LENGTH_LONG).show();
                    Intent intent3  = new Intent(getApplicationContext(), Election_List.class);
                    intent3.putExtra("user_id", user_id);
                    startActivity(intent3);
                    finish();*/
                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }

    
}
